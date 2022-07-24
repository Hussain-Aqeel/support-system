<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tickets') }}
      </h2>
    </div>
  </x-slot>
  
  <div class="flex justify-end">
    <x-buttons.btn color="sky" wire:click="addView" class="mr-4 lg:mr-20 mt-5">
      Add Ticket
    </x-buttons.btn>
  </div>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="px-4 sm:px-6 lg:px-8">
    @if(count($tickets))
      <div class="mt-8 flex flex-col">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            <x-table.headings>Title</x-table.headings>
            <x-table.headings>Description</x-table.headings>
            <x-table.headings>Actions</x-table.headings>
          </x-slot:head>
          <x-slot:body>
            @foreach($tickets as $ticket)
              <x-table.row>
                <x-table.cell>{{ $ticket->id }}</x-table.cell>
                <x-table.cell>{{ $ticket->title }}</x-table.cell>
                <x-table.cell class="inline-block truncate w-[50em] py-6">
                  {{ $ticket->description }}
                </x-table.cell>
                <x-table.cell>
                  <a href="{{ route('showTicket', [ 'ticketId' => $ticket->id]) }}"
                     class="inline-flex items-center justify-center rounded-md border
                     border-transparent bg-gray-700 px-4 py-2 text-sm font-medium text-white
                      shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2
                      focus:ring-gray-500 focus:ring-offset-2 sm:w-auto">Show</a>
                </x-table.cell>
              </x-table.row>
            @endforeach
          </x-slot:body>
        </x-table>
      </div>
      <div class="mt-3">
        {{ $tickets->links() }}
      </div>
      </div>
    @else
      <h3 class="mt-7 leading-3">You haven't issued any tickets.</h3>
    @endif
  </div>
</div>
