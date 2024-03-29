<form wire:submit="save">
    <x-form.cover for="task" label="Task" :error="$errors->first('task')">
        <x-form.text id="task" wire:model="task" placeholder="Task" />
    </x-form.cover>

    <ul class="flex items-center space-x-2 pb-5">
        <li class="text-white">Priority:</li>
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

    <div class="flex justify-between items-center">
        <x-button-action full label="Save" />
        <x-button color="danger" wire:click="return">Cancel</x-button>
    </div>
</form>

