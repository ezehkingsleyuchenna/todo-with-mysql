@props([
    'for',
    'label' => '',
    'error' => null,
])
<div class="flex flex-col mb-6">
    <label for="{{ $for }}" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">{{ $label }}</label>
    {{ $slot }}

    <p @class(['text-red-500 mt-1 text-xs' => $error, 'hidden' => ! $error])>
        {{ $error }}
    </p>
</div>
