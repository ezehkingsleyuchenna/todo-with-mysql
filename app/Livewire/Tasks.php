<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Tasks extends Component
{
    public ?int $projectId = null;
    public $project, $projects;
    public $openTasks, $completedTasks;
    #[Validate(['required', 'string', 'max:255'])]
    public string $task;

    public function mount(): void
    {
        $this->getProject();
        $this->getProjects();
//        get tasks
        if ($this->project) {
            $this->getOpenTasks();
            $this->getCompletedTasks();
        }
    }

    public function updatingProjectId($value): void
    {
        $this->projectId = $value;
        $this->getProject();

        $this->getOpenTasks();
        $this->getCompletedTasks();
    }

    public function getProjects(): void
    {
        $this->projects = Project::query()->whereUserId(auth()->id())->get();
    }

    public function getProject(): void
    {
        $this->project =
            Project::query()
                ->whereUserId(auth()->id())
                ->when($this->projectId, fn($query) => $query->whereId($this->projectId))
                ->first();
    }

    public function addTask(): bool
    {
        $this->validate();
//        create task
        Todo::query()->create([
            'project_id' => $this->project->id,
            'task' => $this->task,
            'task_order' => ($this->project->tasks->count() + 1)
        ]);
//        refresh open task
        $this->getOpenTasks();
        $this->reset('task');

        return true;
    }

    public function getOpenTasks(): void
    {
        $this->openTasks = Todo::query()->whereProjectId($this->project->id)->whereStatus(1)->get();
    }

    public function getCompletedTasks(): void
    {
        $this->completedTasks = Todo::query()->whereProjectId($this->project->id)->whereStatus(2)->get();
    }

    public function markAsCompleted(Todo $todo): bool
    {
        $todo->status = 2;
        $todo->save();
//        refresh open & completed task
        $this->getOpenTasks();
        $this->getCompletedTasks();

        return true;
    }

    public function delete(Todo $todo): bool
    {
        $todo->delete();
//        refresh done task
        $this->getCompletedTasks();

        return true;
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
