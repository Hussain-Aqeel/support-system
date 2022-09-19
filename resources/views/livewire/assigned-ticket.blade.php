{{--<div>--}}
{{--    @foreach($assigned as $assignedTicket)--}}
{{--        <p>{{ \App\Models\Ticket::whereId($ticket->ticket_id)->value('title') }}</p>--}}
{{--    @endforeach--}}
{{--</div>--}}

<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Assigned tickets') }}
      </h2>
    </div>
  </x-slot>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="mt-3.5 pb-14 px-4 sm:px-6 lg:px-8">
    
    @if(count($tickets))
      <div class="flex flex-col mt-8">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            <x-table.headings>User</x-table.headings>
            <x-table.headings>Title</x-table.headings>
            <x-table.headings>Type</x-table.headings>
            <x-table.headings>Description</x-table.headings>
            <x-table.headings>Priority</x-table.headings>
            <x-table.headings>Status</x-table.headings>
            <x-table.headings>Actions</x-table.headings>
          </x-slot:head>
          <x-slot:body>
            @foreach($tickets as $ticket)
              <x-table.row>
                <x-table.cell>{{ $ticket->id }}</x-table.cell>
                <x-table.cell>
                  {{ \App\Models\User::where('id', $ticket->user_id)->value('name') }}
                </x-table.cell>
                <x-table.cell>{{ $ticket->title }}</x-table.cell>
                <x-table.cell>{{ $ticket->type->title }}</x-table.cell>
                <x-table.cell class="inline-block truncate w-[50em] py-6">
                  {{ $ticket->description }}
                </x-table.cell>
                <x-table.cell>
                  <x-priority name="{{ $ticket->priority->name }}"/>
                </x-table.cell>
                <x-table.cell>
                  {{ $ticket->status }}
                </x-table.cell>
                <x-table.cell>
                  <a href="{{ route('show-ticket', [ 'ticketKey' => $ticket->key]) }}"
                     class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:w-auto">Show</a>
                </x-table.cell>
              </x-table.row>
            @endforeach
          </x-slot:body>
        </x-table>
      </div>
  </div>
  @else
    <h3 class="leading-3 mt-7">You have 0 assigned tickets</h3>
  @endif
</div>
</div>
