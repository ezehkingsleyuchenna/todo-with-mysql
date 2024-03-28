<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Tasks extends Component
{
    public int $projectId = 0;
    public $project, $projects;

    public function mount(): void
    {
        $this->getProject();
        $this->getProjects();
    }

    public function updatingProjectId($value): void
    {
        $this->projectId = $value;
        $this->getProject();
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

    public function render()
    {
        return view('livewire.tasks');
    }
}
