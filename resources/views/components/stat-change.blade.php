@props(['change'])

@if ($change > 0)
    <span class="text-sm font-medium text-green-500 ml-2">
        +{{ number_format($change, 2) }}%
    </span>
@elseif ($change < 0)
    <span class="text-sm font-medium text-red-500 ml-2">
        {{ number_format($change, 2) }}%
    </span>
@endif
