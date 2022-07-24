<div class="mt-8 flex m-2 p-2 space-x-3">
    <input autocomplete="off" wire:model="reference" id="reference" name="reference" type="text"
           placeholder="Search by Reference"
           class="appearance-none block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">

    <input autocomplete="off" wire:model="tracking" id="tracking" name="tracking" type="text"
           placeholder="Search by Tracking"
           class="appearance-none block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">

    <input autocomplete="off" wire:model="validationCount" id="validationCount" name="validationCount" type="text"
           placeholder="Search by Validation Count"
           class="appearance-none block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">

    <select autocomplete="off" wire:model="group" id="status" name="group" type="text"
            placeholder="Find by Group"
            class="appearance-none block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
        <option value="">Select Group</option>
        <option value="daily">Daily</option>
        <option value="renewal">Renewal</option>
    </select>

    <select autocomplete="off" wire:model="batchId" id="batchId" name="batchId" type="text"
            placeholder="Find by Group"
            class="appearance-none block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
        <option value="">Select Batch</option>
        @foreach($batches as $key => $batch)
            <option value="{{$key}}">{{$batch}}</option>
        @endforeach
    </select>
</div>

<x-table>
    <x-slot name="head">
        <x-table.headings>Group</x-table.headings>
        <x-table.headings>Reference</x-table.headings>
        <x-table.headings>Tracking</x-table.headings>
        <x-table.headings>Location</x-table.headings>
        <x-table.headings>In Network</x-table.headings>
        <x-table.headings>Address/City</x-table.headings>
        <x-table.headings>Status</x-table.headings>
        <x-table.headings>Last Update</x-table.headings>
        <x-table.headings>Validation Count</x-table.headings>
        <x-table.headings>Action</x-table.headings>
    </x-slot>
    <x-slot name="body">
        @foreach($shipments as $item)
            <x-table.row>
                <x-table.cell>{{$item->group}}</x-table.cell>
                <x-table.cell>{{$item->reference}}</x-table.cell>
                <x-table.cell>{{$item->tracking}}</x-table.cell>
                <x-table.cell>{{$item->location}}</x-table.cell>
                <x-table.cell>
                    @if($item->in_network)
                        <div  class="ml-4">
                            <x-svg.success></x-svg.success>
                        </div>
                    @else
                        <div  class="ml-4">
                            <x-svg.error></x-svg.error>
                        </div>
                    @endif
                </x-table.cell>
                <x-table.cell>{{$item->map_address ?? $item->delivery_address.', '.$item->delivery_city}}</x-table.cell>
                <x-table.cell>{{$item->status_label}}</x-table.cell>
                <x-table.cell>{{$item->updated_at}}</x-table.cell>
                <x-table.cell>{{$item->validation_count}}</x-table.cell>
                <x-table.cell>
                    <a target="__blank" href="{{ route('ops.shipment.edit', ['key' => $item->tracking]) }}">
                        <x-buttons.btn color="green">View</x-buttons.btn>
                    </a>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-slot>
</x-table>