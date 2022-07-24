@props(['sortedLocations'])


<div class="relative">
    <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="relative flex justify-center">
        <button x-on:click="open = !open" type="button" class="inline-flex items-center shadow-sm px-4 py-1.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
            <!-- Heroicon name: solid/plus-sm -->
            <svg class="-ml-1.5 mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span x-text="open ? 'Hide all locations': 'Show all locations'"></span>
        </button>
    </div>
</div>

<!-- Available Locations-->
<div x-show="open" x-transition class="border border-gray-300 rounded-md shadow-md space-y-6 px-5 p-8 m-5 bg-white">
    <div class="flex float-right w-1/2">
        <input  wire:model.lazy="search" autocomplete="off" type="text" placeholder="Search for a location ..." class="appearance-none block w-full border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
    </div>
    <div class="bg-grey border-b border-gray-200">
        <x-card.header>Available Locations</x-card.header>
    </div>
    <div class="overflow-x-hidden mt-8 flex flex-col align-middle">
        @if(isset($sortedLocations))
            <div class="grid xl:grid-cols-6 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 gap-4 m-1">
                @foreach($sortedLocations as $location)
                    @if($location['count'] == 50)
                        <x-location.title class="bg-rose-200 hover:bg-rose-400 cursor-not-allowed">{{ $location['title'] }}<div>{{ $location['count'] }}</div></x-location.title>
                    @elseif($location['count'] >= 40)
                        <x-location.title wire:click="selectLocation('{{ $location['title'] }}')" x-on:click="$refs.reference.focus()" class="bg-amber-200 hover:bg-amber-400 cursor-pointer">{{ $location['title'] }}<div>{{ $location['count'] }}</div></x-location.title>
                    @else
                        <x-location.title wire:click="selectLocation('{{ $location['title'] }}')" x-on:click="$refs.reference.focus()" class="bg-emerald-200 hover:bg-emerald-400 cursor-pointer">{{ $location['title'] }}<div>{{ $location['count'] }}</div></x-location.title>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>