<div>
    <div class="grid grid-cols-1 md:grid-cols-2 mb-4">
        <div></div>
        <x-form.select placeholder="Projects" wire:model.live="projectId" is-null>
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
            <div class="h-auto px-2 bg-white rounded-lg mb-4">
                <form wire:submit="addTask" class="relative">
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
                    @if($errors->first('task'))
                        <p @class(['text-red-500 mt-1 text-xs'])>
                            {{ $errors->first('task') }}
                        </p>
                    @endif

                    <ul class="flex items-center space-x-2 pb-5">
                        <li>Priority:</li>
                        <li>
                            <input type="radio" id="pr1" name="priority" value="1" class="hidden peer" wire:model="priority" />
                            <label
                                for="pr1"
                                class="inline-flex py-1 px-5 text-gray-500 bg-white cursor-pointer rounded
                                 peer-checked:text-gray-100 peer-checked:bg-green-600
                                  hover:text-gray-200 hover:bg-green-600"
                            >
                                #1
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="pr2" name="priority" value="2" class="hidden peer" wire:model="priority" />
                            <label
                                for="pr2"
                                class="inline-flex py-1 px-5 text-gray-500 bg-white cursor-pointer rounded
                                 peer-checked:text-gray-100 peer-checked:bg-red-600
                                  hover:text-gray-200 hover:bg-red-600"
                            >
                                #2
                            </label>
                        </li>
                    </ul>
                </form>
            </div>

            <div class="space-y-6">
                @foreach(['#1' => 'priorityTasks1', '#2' => 'priorityTasks2', 'completed' => 'completedTasks'] as $key => $item)
                    <div
                        @class([
                            'border-l-4 border-green-600' => ('priorityTasks1' === $item),
                            'border-l-4 border-red-600' => ('priorityTasks2' === $item),
                            'bg-white rounded-lg p-4',
                        ])>
                        <p
                            @class([
                                'text-green-600' => ('priorityTasks1' === $item),
                                'text-red-600' => ('priorityTasks2' === $item),
                                'text-xl font-semibold mt-2 text-blue-900 capitalize',
                            ])
                        >
                            {{ $key }} Task
                        </p>
                        <ul class="my-4 text-gray-300">
                            @forelse($$item as $task)
                                <li class=" mt-4" id="1">
                                    <div class="flex gap-2">
                                        @if($task->is_active)
                                            <div
                                                wire:click="completedTask({{ $task->id }})"
                                                class="w-9/12 bg-slate-700 text-slate-400 rounded-[7px] flex justify-start items-center py-2 px-3 group cursor-pointer"
                                            >
                                                <x-icons.check-circle class="w-6 h-6 group-hover:text-green-600 transition-all" />
                                                <div class="ml-4">
                                                    <span class="text-sm group-hover:line-through font-semibold">
                                                        {{ $task->task }}
                                                    </span>
                                                    <span class="block text-xs lowercase">
                                                        {{ $task->created_at->format('M.d.Y h:ia') }}
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <div wire:click="delete({{ $task->id }})"
                                                 class="w-9/12 h-12 bg-slate-700 rounded-[7px] flex justify-start items-center px-3 group cursor-pointer">
                                                <x-icons.check-circle class="w-6 h-6 text-green-600 group-hover:hidden transition-all" />
                                                <x-icons.trash class="w-6 h-6 text-red-500 hidden group-hover:inline-block transition-all" />
                                                <span class="text-sm ml-4 group-hover:line-through font-semibold">{{ $task->task }}</span>
                                            </div>
                                        @endif
                                        <div class="w-1/4">
                                            @if($task->is_active)
                                                <x-button
                                                    wire:click="completedTask({{ $task->id }})"
                                                    title="Completed"
                                                    :full="false"
                                                    color="success"
                                                >
                                                    <x-icons.check-circle class="w-4 h-4 mx-auto" />
                                                </x-button>
                                                <x-button wire:click="edit({{ $task->id }})" title="Edit" :full="false">
                                                    <x-icons.pencil-square class="w-4 h-4 mx-auto" />
                                                </x-button>
                                            @endif
                                            <x-button
                                                wire:click="delete({{ $task->id }})"
                                                wire:confirm="Confirm Action"
                                                title="Delete"
                                                :full="false"
                                                color="danger"
                                            >
                                                <x-icons.trash class="w-4 h-4 mx-auto" />
                                            </x-button>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class=" mt-4" id="2">
                                    <div class="px-3 text-gray-600">
                                        No {{ $key }} Task found
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
