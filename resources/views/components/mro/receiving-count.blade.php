@props(['shipmentsCount'])

<x-card>
    <x-card.header>Shipments Count</x-card.header>
    <table class="min-w-full divide-y divide-transparent shadow-md overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <x-table.body>
            <tr class="divide-x divide-transparent bg-gray-200">
                <td class="text-black  py-4 pl-4 pr-4 text-md font-bold sm:pl-6">Total</td>
                <td class="text-black lining-nums p-4 text-md text-center">{{ $shipmentsCount['total'] }}</td>
                <td></td>
            </tr>
            <tr class="divide-x divide-transparent bg-green-200">
                <td class="text-black  py-4 pl-4 pr-4 text-md font-bold sm:pl-6">Confirmed</td>
                <td class="text-black lining-nums p-4 text-md text-center">{{ $shipmentsCount['confirmed'] }}</td>
                <td></td>
            </tr>
            <tr class="divide-x divide-transparent bg-yellow-200">
                <td class="text-black  py-4 pl-4 pr-4 text-md font-bold sm:pl-6">Remaining</td>
                <td class="text-black lining-nums p-4 text-md text-center">{{ $shipmentsCount['remaining'] }}</td>
                <td><div title="Export remaining shipments"><x-svg.download wire:click="exportPending"/></div></td>

            </tr>
            <tr class="divide-x divide-transparent bg-red-200">
                <td class="text-black  py-4 pl-4 pr-4 text-md font-bold sm:pl-6">Missing</td>
                <td class="text-black lining-nums p-4 text-md text-center">{{ $shipmentsCount['missing'] }}</td>
                <td><div title="Export missing shipments"><x-svg.download wire:click="exportMissing"/></div></td>
            </tr>
        </x-table.body>
    </table>
</x-card>