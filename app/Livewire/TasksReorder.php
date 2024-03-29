<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Todo;
use Livewire\Component;

class TasksReorder extends Component
{
    public string $priority;
    public Project $project;

    public int $featurePaid = 0;
    public $tasksOrder;

    public function updateTasksOrder($list): void
    {
        foreach ($list as $item) {
            Todo::query()
                ->whereStatus(1)
                ->whereProjectId($this->project->id)
                ->wherePriority($this->priority)
                ->find($item['value'])
                ->update(['task_order' => $item['order']]);
        }
    }

    public function return(): bool
    {
//        dispatch created project to home
        $this->dispatch('homeProjectEvent', projectId: $this->project->id)->to(Home::class);
        return true;
    }

    public function getTasks()
    {
        return Todo::query()
            ->whereProjectId($this->project->id)
            ->wherePriority($this->priority)
            ->whereStatus(1)
            ->orderBy('task_order')
            ->get();
    }

    public function render()
    {
        return view('livewire.tasks-reorder', ['tasks' => $this->getTasks()]);
    }
}
