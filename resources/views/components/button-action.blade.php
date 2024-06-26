@props([
    'label' => 'Save',
    'color' => 'success',
    'full' => false,
    'icon' => null,
])
@php
    $wireTarget = $attributes->get('wire:target') ?: 'save';
@endphp
<div @class(['w-full' => $full])>
    <x-button
        {{ $attributes->class(['flex w-full' => $full, 'inline-flex' => ! $full, 'justify-center items-center space-x-2'])
                        ->merge(['type' => 'submit']) }}
        wire:loading.attr="disabled"
        wire:loading.class="opacity-50"
        :$color
    >
        <span wire:loading @if($wireTarget) wire:target="{{ $wireTarget }}" @endif>
            <x-icons.spinner sizes="w-4 h-4" />
        </span>
        <span>{{ $label }}</span>
        <span wire:loading.remove @if($wireTarget) wire:target="{{ $wireTarget }}" @endif>
            {{ $icon }}
        </span>
    </x-button>
</div>
