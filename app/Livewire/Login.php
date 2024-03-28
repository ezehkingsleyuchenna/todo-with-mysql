<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate(['required', 'email', 'exists:users,email'])]
    public string $email;
    #[Validate(['required', 'string'])]
    public string $password;

    public function login()
    {
        $this->validate();
//        check user
        if (! auth()->attempt($this->only('email', 'password'), true))
            return $this->addError('email', trans('auth.failed'));
        $user = auth()->user();
//        redirect
        $this->redirect(route('index'), true);
        return true;
    }

    public function render()
    {
        return view('livewire.login');
    }
}
