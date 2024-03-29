<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
    #[Validate(['required', 'string', 'min:1', 'max:200'])]
    public string $name;
    #[Validate(['nullable', 'string', 'max:300'])]
    public ?string $description = null;

    public function save(): bool
    {
//        make user
        $project = Project::make();
//        save to table
        $project->user_id = auth()->id();
        $project->name = $this->name;
        $project->description = $this->description;
        $project->save();

//        dispatch created project to home
        $this->dispatch('homeProjectEvent', projectId: $project->id)->to(Home::class);

        return true;
    }
    public function render()
    {
        return view('livewire.create-project');
    }
}
