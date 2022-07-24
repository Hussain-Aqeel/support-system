@props(['class'=>''])
<x-buttons.btn x-show="open" wire:click="resetFilters" color="green" {{ $attributes->merge(['class' => $class])}}>
    <x-svg.reset-icon />
</x-buttons.btn>