@props(['currentLocation', 'rackURL'])

<x-card class="max-h-56 w-2/6">
    <x-card.header>Current Location</x-card.header>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="space-y-3 inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                @if(isset($currentLocation) && !empty($currentLocation))
                    <a href="{{ $rackURL }}" target="_blank">
                    @if($currentLocation['count'] == 50)
                        <x-location.title class="bg-rose-200 hover:bg-rose-400">{{ $currentLocation['title'] }}<div>{{ $currentLocation['count'] }}</div></x-location.title>
                    @elseif($currentLocation['count'] >= 40)
                        <x-location.title class="bg-amber-200 hover:bg-amber-400">{{ $currentLocation['title'] }}<div>{{ $currentLocation['count'] }}</div></x-location.title>
                    @else
                        <x-location.title class="bg-emerald-200 hover:bg-emerald-400">{{ $currentLocation['title'] }}<div>{{ $currentLocation['count'] }}</div></x-location.title>
                    @endif
                    </a>
                    <x-location.title wire:click="removeLocation()" class="bg-rose-200 hover:bg-rose-400 cursor-pointer">Remove Location</x-location.title>
                @else
                    <x-card.muted>No Selected Location</x-card.muted>
                @endif
            </div>
        </div>
    </div>
</x-card>