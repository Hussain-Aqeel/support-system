@props(['confirmedByReference'])

<x-card class="w-4/6 overflow-hidden">
    <x-card.header>Confirmed By Reference</x-card.header>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                @if(isset($confirmedByReference) && !empty($confirmedByReference))
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <x-table.cbr.head />
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($confirmedByReference as $shipment)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$shipment['reference']}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$shipment['AWB']}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$shipment['location']}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$shipment['status']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <x-card.muted>No Received Shipments</x-card.muted>
                @endif
            </div>
        </div>
    </div>
</x-card>