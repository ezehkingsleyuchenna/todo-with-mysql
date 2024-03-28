<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public array $menus = [
        'tasks' => 'Tasks',
        'create-project' => 'Create Project',
    ];
    public ?string $menu = 'tasks';
    public bool $isCreateProject, $isTasks;

    public function mount(): void
    {
        $this->setCurrentMenu();
    }


    public function setCurrentMenu(): void
    {
        $this->isTasks = ($this->menu === 'tasks');
        $this->isCreateProject = ($this->menu === 'create-project');
    }

    public function switchPage($page): void
    {
        $this->menu = $page;
        $this->setCurrentMenu();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
