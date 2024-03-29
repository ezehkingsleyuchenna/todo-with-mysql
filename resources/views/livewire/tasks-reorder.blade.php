<div>
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-300 pb-1.5">! drag the icon left beside each review</p>
        <x-button wire:click="return" :full="false">Back</x-button>
    </div>

    <div
        class="divide-y divide-gray-200 bg-white py-5 rounded"
        wire:sortable="updateTasksOrder"
        wire:sortable.options="{ animation: 100 }"
    >
        @foreach($tasks as $item)
            <div
                wire:sortable.item="{{ $item->id }}"
                wire:key="task-{{ $item->id }}"
                class="flex items-center space-x-3 px-3 py-3"
            >
                <x-icons.squares-2x2
                    wire:sortable.handle
                    sizes="w-8 h-8"
                    class="text-site-color cursor-grab hover:opacity-80"
                    title="drag to position"
                />
                <span>{{ $item->task }}</span>
            </div>
        @endforeach
    </div>
</div>
