<div>
    <div class="h-auto px-2 bg-white rounded-lg">
        <form wire:submit="addTodo" class="relative">
            <label for="task" class="sr-only">Task</label>
            <input id="task" wire:model="task" class="text-sm h-12 w-full my-4 pr-20 md:pr-28 outline-none pl-8" type="text" placeholder="Write a new task">
            <button
                class="add_task text-sm transition-all hover:bg-blue-700 cursor-pointer text-white bg-blue-400 rounded-lg h-10 w-16 md:w-24 absolute right-1 top-[20px]">
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
</div>
