<x-card>
    <x-card.header>Receiving By Reference</x-card.header>
    <div>
        <x-form.label>Location</x-form.label>
        <x-form.input x-on:keyup.enter="$refs.reference.focus()" wire:model.lazy="location" wire:keydown.enter="selectLocation" />
        <x-form.error for="location" />
    </div>

    <div>
        <x-form.label>Shipment Reference</x-form.label>
        <x-form.input x-ref="reference" wire:model.lazy="shipmentReference" wire:keydown.enter="receive" />
        <x-form.error for="shipmentReference" />
    </div>
</x-card>