<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public array $menus = [
        'tasks' => 'Tasks',
        'create-project' => 'Create Project',
    ];
    public ?string $menu = 'tasks';
    public ?string $priority;
    public ?int $projectId = null;
    public bool $isCreateProject, $isTasks, $isEdit, $isReorder;
    public Todo $todo;
    public Project $project;

    public function mount(): void
    {
        $this->setCurrentMenu();
    }

    public function setCurrentMenu(): void
    {
        $this->isTasks = ($this->menu === 'tasks');
        $this->isCreateProject = ($this->menu === 'create-project');
        $this->isEdit = ($this->menu === 'task-edit');
        $this->isReorder = ($this->menu === 'tasks-reorder');
    }

    public function switchPage($page): void
    {
        $this->menu = $page;
        $this->setCurrentMenu();
    }

    #[On('homeProjectEvent')]
    public function homeProjectEvent($projectId): void
    {
        $this->projectId = $projectId;
        $this->switchPage('tasks');
    }

    #[On('taskEdit')]
    public function taskEdit(Todo $todo): void
    {
        $this->todo = $todo;
        $this->switchPage('task-edit');
    }

    #[On('tasksReorder')]
    public function tasksReorder($priority, Project $project): void
    {
        $this->priority = $priority;
        $this->project = $project;
        $this->switchPage('tasks-reorder');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
