<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SignUp extends Component
{
    #[Validate(['required', 'string'])]
    public string $name;
    #[Validate(['required', 'email', 'unique:users,email'])]
    public string $email;
    #[Validate(['required', 'string', 'min:5'])]
    public string $password;
    public function register(): bool
    {
        $this->validate();
//        make user
        $user = User::make();
//        save to table
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();
//        login
        Auth::login($user);
//        redirect
        $this->redirect(route('list'), true);

        return true;
    }

    public function render()
    {
        return view('livewire.sign-up');
    }
}
