<div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
        <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Register</div>
        <div class="mt-10">
            <form wire:submit="register">
                <x-form.cover for="name" label="Name:" :error="$errors->first('name')">
                    <x-form.text id="name" wire:model.live.debounce="name" placeholder="Name" />
                </x-form.cover>
                <x-form.cover for="email" label="E-Mail Address:" :error="$errors->first('email')">
                    <x-form.text id="email" type="email" wire:model.live.debounce="email" placeholder="Email">
                        <x-slot:icon>
                            <x-icons.at-sign class="w-6 h-6" />
                        </x-slot:icon>
                    </x-form.text>
                </x-form.cover>
                <x-form.cover for="password" label="Password:" :error="$errors->first('password')">
                    <x-form.text id="password" type="password" wire:model.live.debounce="password" placeholder="...">
                        <x-slot:icon>
                            <x-icons.lock class="w-6 h-6" />
                        </x-slot:icon>
                    </x-form.text>
                </x-form.cover>

                <x-button-action full label="Register" wire:target="register">
                    <x-slot:icon>
                        <x-icons.user-plus class="w-6 h-6" />
                    </x-slot:icon>
                </x-button-action>
            </form>
        </div>
        <div class="flex justify-center items-center mt-6">
            <a href="{{ route('login') }}" wire:navigate class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                <span>
                    <x-icons.arrow-right-circle class="w-6 h-6" />
                </span>
                <span class="ml-2">Have an account?</span>
            </a>
        </div>
    </div>
</div>
