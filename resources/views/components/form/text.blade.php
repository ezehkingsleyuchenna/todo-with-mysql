@props([
    'icon' => null
])

<div class="relative">
    @if($icon)
        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
            {!! $icon !!}
        </div>
    @endif
    <input {{ $attributes->class([
        'text-sm sm:text-base placeholder-gray-500',
        'rounded-lg border border-gray-400 w-full py-2',
        'focus:outline-none focus:border-blue-400',
        'pr-4',
        'pl-10' => $icon,
        'pl-4' => ! $icon
    ])->merge() }} />
</div>
