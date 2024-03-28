@props([
    'label' => 'Save',
    'color' => 'success',
    'full' => false,
    'icon' => null,
])
@php
    $wireTarget = $attributes->get('wire:target') ?: 'save';
@endphp
<div>
    <x-button
        {{ $attributes->class(['flex w-full' => $full, 'inline-flex' => ! $full, 'justify-center items-center space-x-2'])
                        ->merge(['type' => 'submit']) }}
        wire:loading.attr="disabled"
        :$color
    >
        <span wire:loading @if($wireTarget) wire:target="{{ $wireTarget }}" @endif>
            <x-icons.spinner sizes="w-3 h-3" />
        </span>
        <span>{{ $label }}</span>
        <span>
            @if($icon)
                <x-icons.user-plus class="w-6 h-6" />
            @endif
        </span>
    </x-button>
</div>
