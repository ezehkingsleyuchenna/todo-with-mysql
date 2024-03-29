<?php

namespace App\Livewire;

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
    public ?int $projectId = null;
    public bool $isCreateProject, $isTasks, $isEdit;
    public Todo $todo;

    public function mount(): void
    {
        $this->setCurrentMenu();
    }


    public function setCurrentMenu(): void
    {
        $this->isTasks = ($this->menu === 'tasks');
        $this->isCreateProject = ($this->menu === 'create-project');
        $this->isEdit = ($this->menu === 'task-edit');
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

    public function render()
    {
        return view('livewire.home');
    }
}
