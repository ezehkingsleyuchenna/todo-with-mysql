<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskEdit extends Component
{
    public Todo $todo;
    #[Validate(['required', 'string', 'max:255'])]
    public string $task;
    #[Validate(['required', 'numeric', 'in:1,2'])]
    public int $priority = 1;

    public function mount(): void
    {
        $this->fill($this->todo->only('task', 'priority'));
    }

    public function save(): bool
    {
//        save to table
        $this->todo->task = $this->task;
        $this->todo->priority = $this->priority;
//        ORDER
        if ($this->todo->isDirty('priority'))
            $this->todo->task_order = ($this->todo->project->tasks->where('priority', $this->priority)->count() + 1);
//        ORDER
        $this->todo->save();

        return $this->return();
    }

    public function return(): bool
    {
//        dispatch created project to home
        $this->dispatch('homeProjectEvent', projectId: $this->todo->project->id)->to(Home::class);
        return true;
    }

    public function render()
    {
        return view('livewire.task-edit');
    }
}
