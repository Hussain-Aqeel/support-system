<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Tickets') }}
      </h2>
    </div>
  </x-slot>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="mt-3.5 pb-14 px-4 sm:px-6 lg:px-8">
    @if(!$showSearchBox)
      <button
        title="search"
        class="block mb-8 bg-sky-500 hover:bg-sky-600 transition-all duration-200 text-white
         p-4 rounded-full" wire:click="toggleSearchBox">
        @svg('bi-search')
      </button>
    @endif
    
    @if($showSearchBox)
      <div>
        <div class="flex w-fit items-center justify-between mb-2">
          <button
            title="close"
            class="mb-8 bg-red-400 hover:bg-red-700 transition-all duration-200 text-white
            p-2.5 rounded-full" wire:click="toggleSearchBox">
            @svg('css-close')
          </button>
        </div>
        <x-buttons.btn color="blue" wire:click="resetSearch" class="lg:mr-56 mb-4">
          reset
        </x-buttons.btn>
        <div class="flex w-fit items-center justify-between">
          <div class="grid grid-cols-4 p-2 border-t-2">
            <x-search model="searchID" placeholder="Search by ID" name="ID"/>
            <x-search model="searchUser" placeholder="Search by user" name="User"/>
            <x-search model="searchTitle" placeholder="Search by title" name="Title"/>
            <x-search model="searchType" placeholder="Search by type" name="Type"/>
            <x-search model="searchDescription" placeholder="Search by description"
                      name="Description"/>
            <x-search model="searchPriority" placeholder="Search by Priority"
                      name="priority"/>
            <x-search model="searchStatus" placeholder="Search by status"
                      name="status"/>
          </div>
        </div>
      </div>
    @endif
  
    <x-buttons.btn color="sky" wire:click="addTicket" class="mt-5 mr-4 lg:mr-20">
      Add Ticket
    </x-buttons.btn>
    
    
    @if(count($tickets))
      <div class="flex flex-col mt-8">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            @hasanyrole('admin|manager')
            <x-table.headings>User</x-table.headings>
            @endhasanyrole
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
                @hasanyrole('admin|manager')
                <x-table.cell>
                {{ \App\Models\User::where('id', $ticket->user_id)->value('name') }}
                </x-table.cell>
                @endhasanyrole
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
                  <a href="{{ route('edit-ticket', [ 'ticketId' => $ticket->id ]) }}"
                     class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-emerald-700 hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 sm:w-auto">Edit</a>
                  @hasanyrole('admin|manager')
                  <a href="#"
                     class="inline-flex items-center justify-center px-4 py-2 text-sm
                     font-medium text-white border border-transparent rounded-md shadow-sm
                     bg-fuchsia-700 hover:bg-fuchsia-900 focus:outline-none focus:ring-2
                     focus:ring-fuchsia-500 focus:ring-offset-2 sm:w-auto">Delegate</a>
                  @endhasanyrole
                  
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
      <h3 class="leading-3 mt-7">You haven't issued any tickets.</h3>
    @endif
  </div>
</div>
