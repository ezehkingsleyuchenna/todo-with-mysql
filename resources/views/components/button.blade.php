@props([
    'color' => 'primary',
    'full' => true,
])
<button {{ $attributes->class([
    'focus:outline-none text-white text-sm sm:text-base',
    'bg-blue-600 hover:bg-blue-700' => $color === 'primary',
    'bg-red-600 hover:bg-red-700' => $color === 'danger',
    'bg-green-600 hover:bg-green-700' => $color === 'success',
    'rounded py-2 transition duration-150 ease-in',
    'w-full' => $full,
    'px-4' => ! $full
])->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
