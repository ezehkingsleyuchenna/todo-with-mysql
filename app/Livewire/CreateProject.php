<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
    #[Validate(['required', 'string', 'min:1', 'max:200'])]
    public string $name;
    #[Validate(['nullable', 'string', 'max:300'])]
    public string $description;

    public function save(): bool
    {
        $this->validate();
//        make user
        $project = \App\Models\Project::make();
//        save to table
        $project->name = $this->name;
        $project->description = $this->description;
        $project->save();
//        redirect
        $this->redirect(route('home'), true);

        return true;
    }
    public function render()
    {
        return view('livewire.create-project');
    }
}
