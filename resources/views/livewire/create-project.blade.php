<form wire:submit="save">
    <x-form.cover for="name" label="Name:" :error="$errors->first('name')">
        <x-form.text id="name" wire:model="name" placeholder="Name" />
    </x-form.cover>
    <x-form.cover for="description" label="Description:" :error="$errors->first('description')">
        <x-form.textarea
            id="description"
            wire:model="description"
            placeholder="Description"
            rows="5"
        />
    </x-form.cover>

    <x-button-action full label="Create" />
</form>
