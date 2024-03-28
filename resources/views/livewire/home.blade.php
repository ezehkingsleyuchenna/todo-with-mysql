<div>
    <!-- navbar -->
    <nav class="flex justify-between bg-gray-900 text-white">
        <div class="px-5 xl:px-12 py-6 flex w-full justify-between items-center">
            <a class="text-3xl font-bold font-heading" href="{{ route('home') }}">
                TODO
            </a>

            <a class="flex items-center hover:text-gray-200" href="{{ route('logout') }}">
                <x-icons.arrow-right-on-rectangle class="h-6 w-6 hover:text-gray-200" />
            </a>
        </div>
    </nav>
    <div class="bg-slate-700 min-h-screen space-y-10 pt-10">
        <div class="w-11/12 md:w-1/2 mx-auto">
            <div class="flex items-center space-x-3 py-5">
                @foreach($menus as $key => $value)
                    @if(($key === $menu))
                        <x-button class="opacity-50">
                            {!! $value !!}
                        </x-button>
                    @else
                        <x-button wire:click="switchPage('{{ $key }}')">
                            {!! $value !!}
                        </x-button>
                    @endif
                @endforeach
            </div>

            <div class="mt-12">
                @if($isTasks)
                    <livewire:tasks />
                @elseif($isCreateProject)
                    <livewire:create-project />
                @endif
            </div>
        </div>
    </div>
</div>
