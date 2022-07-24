@props(['class'=>''])
<x-buttons.btn x-on:click="open = ! open"  color="green" {{ $attributes->merge(['class' => $class])}}>
    <x-svg.filter-icon />
</x-buttons.btn>