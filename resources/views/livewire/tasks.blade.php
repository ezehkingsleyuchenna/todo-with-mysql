<div>
    <div class="grid grid-cols-1 md:grid-cols-2 mb-4">
        <div></div>
        <x-form.select placeholder="Projects" wire:model.live="projectId">
            @foreach($projects as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </x-form.select>
    </div>

    <div class="mb-4 text-white">
        <h1 class="text-2xl">
            Project:
            <span class="uppercase font-semibold">
                {{ $project?->name ?: 'Create a Project First' }}
            </span>
        </h1>
        <p class="text-sm">
            {{ $project?->description }}
        </p>
    </div>

    <div>
        @if($project)
            <div class="h-auto px-2 bg-white rounded-lg">
                <form wire:submit="addTodo" class="relative">
                    <label for="task" class="sr-only">Task</label>
                    <input
                        id="task"
                        wire:model="task"
                        class="text-sm h-12 w-full my-4 pr-20 md:pr-28 outline-none pl-8"
                        type="text"
                        placeholder="Write a new task"
                    >
                    <button
                        @class([
                            'add_task text-sm',
                            'w-16 md:w-24 h-10 rounded-lg',
                            'absolute right-1 top-[20px]',
                            'text-white bg-blue-400 hover:bg-blue-700',
                            'transition-all cursor-pointer'
                        ])
                    >
                        Add task
                    </button>
                    <x-icons.pencil-square class="w-5 h-5 absolute top-[27px] text-gray-600 left-2" />
                </form>
                @if($errors->first('task'))
                    <p @class(['text-red-500 mt-1 text-xs'])>
                        {{ $errors->first('task') }}
                    </p>
                @endif
            </div>
        @else

        @endif
    </div>

</div>
