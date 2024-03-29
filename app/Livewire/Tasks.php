<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Tasks extends Component
{
    public ?int $projectId = null;
    public $project, $projects;
    public $openTasks, $completedTasks;
    public $priorityTasks1, $priorityTasks2;
    #[Validate(['required', 'string', 'max:255'])]
    public string $task;
    #[Validate(['required', 'numeric', 'in:1,2'])]
    public int $priority = 1;

    public function mount(): void
    {
        $this->getProject();
        $this->getProjects();
//        get tasks
        $this->refreshTask();
    }

    public function updatingProjectId($value): void
    {
        $this->projectId = $value;
        $this->getProject();

        $this->getOpenTasks();
        $this->getCompletedTasks();
        $this->getPriorityTasks1();
        $this->getPriorityTasks2();
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

        $this->projectId = $this->project?->id;
    }

    public function addTask(): bool
    {
        $this->validate();
//        create task
        Todo::query()->create([
            'project_id' => $this->project->id,
            'task' => $this->task,
            'priority' => $this->priority,
            'task_order' => ($this->project->tasks->where('priority', $this->priority)->count() + 1)
        ]);
//        refresh
        $this->refreshTask();
        $this->reset('task', 'priority');

        return true;
    }

    public function completedTask(Todo $todo): bool
    {
        $todo->status = 2;
        $todo->completed_at = now();
        $todo->save();
//        refresh open & completed task
        $this->refreshTask();

        return true;
    }

    public function delete(Todo $todo): bool
    {
        $todo->delete();
//        refresh done task
        $this->refreshTask();
        return true;
    }

    public function edit(Todo $todo)
    {

    }

    public function refreshTask(): void
    {
        if ($this->project) {
//            $this->getOpenTasks();
            $this->getCompletedTasks();
            $this->getPriorityTasks1();
            $this->getPriorityTasks2();
        }
    }

    public function getOpenTasks(): void
    {
        $this->openTasks = Todo::query()->whereProjectId($this->project->id)->whereStatus(1)->get();
    }

    public function getPriorityTasks1(): void
    {
        $this->priorityTasks1 = Todo::query()
            ->whereProjectId($this->project->id)
            ->wherePriority(1)
            ->whereStatus(1)
            ->orderBy('task_order')
            ->get();
    }

    public function getPriorityTasks2(): void
    {
        $this->priorityTasks2 = Todo::query()
            ->whereProjectId($this->project->id)
            ->wherePriority(2)
            ->whereStatus(1)
            ->orderBy('task_order')
            ->get();
    }

    public function getCompletedTasks(): void
    {
        $this->completedTasks = Todo::query()->whereProjectId($this->project->id)->whereStatus(2)->get();
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
