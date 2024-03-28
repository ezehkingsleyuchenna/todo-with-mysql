@props([
    'placeholder' => null,
    'addEmpty' => false,
    'disabled' => true,
    'isNull' => false,
])
<div class="flex relative">
    <select {{ $attributes->class([
                'form-select block w-full py-2 pl-3 pr-8 rounded-lg',
                'focus:outline-none focus:shadow-outline-blue text-xs md:text-sm',
                'disabled:opacity-50 disabled:cursor-not-allowed border',
                'border-gray-300 focus:border-blue-300',
            ])->merge() }}
    >
        @if ($placeholder)
            @if($addEmpty)
                <option selected value="null">{{ $placeholder }}</option>
            @else
                <option @if($disabled) disabled @endif selected value="{{ $isNull ? 'null' : '' }}">{{ $placeholder }}</option>
            @endif
        @endif

        {{ $slot }}
    </select>
</div>
