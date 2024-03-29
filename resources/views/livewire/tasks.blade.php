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
                </form>
                @if($errors->first('task'))
                    <p @class(['text-red-500 mt-1 text-xs'])>
                        {{ $errors->first('task') }}
                    </p>
                @endif
            </div>

            <div class="space-y-6">
                @foreach(['open' => 'openTasks', 'completed' => 'completedTasks'] as $key => $item)
                    <div class="bg-white rounded-lg p-4">
                        <p class="text-xl font-semibold mt-2 text-blue-900 capitalize">{{ $key }} Task</p>
                        <ul class="my-4 text-gray-300">
                            @forelse($$item as $task)
                                <li class=" mt-4" id="1">
                                    <div class="flex gap-2">
                                        @if($key == 'open')
                                            <div wire:click="markAsCompleted({{ $task->id }})"
                                                 class="w-9/12 h-12 bg-slate-700 text-slate-400 rounded-[7px] flex justify-start items-center px-3 group cursor-pointer">
                                                <x-icons.check-circle class="w-6 h-6 group-hover:text-green-600 transition-all" />
                                                <span class="text-sm ml-4 group-hover:line-through font-semibold">{{ $task->task }}</span>
                                            </div>
                                        @else
                                            <div wire:click="delete({{ $task->id }})"
                                                 class="w-9/12 h-12 bg-slate-700 rounded-[7px] flex justify-start items-center px-3 group cursor-pointer">
                                                <x-icons.check-circle class="w-6 h-6 text-green-600 group-hover:hidden transition-all" />
                                                <x-icons.trash class="w-6 h-6 text-red-500 hidden group-hover:inline-block transition-all" />
                                                <span class="text-sm ml-4 group-hover:line-through font-semibold">{{ $task->task }}</span>
                                            </div>
                                        @endif
                                        <div class="w-1/4 h-12 bg-slate-700 rounded-[7px] flex justify-center text-xs font-semibold text-slate-400 items-center">
                                            <div class="text-center">
                                                @if($key == 'open')
                                                    {{ $task->created_at->format('M.d.Y') }} <br>
                                                    {{ $task->created_at->format('h:ia') }}
                                                @else
                                                    {{ $task->updated_at->format('M.d.Y') }} <br>
                                                    {{ $task->updated_at->format('h:ia') }}
                                                @endif
                                            </div>
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
