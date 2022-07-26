<x-slot name="header">
  <div class="mb-7 flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ticket') .' Details' }}
    </h2>
    <a href="{{ route('ticket-list') }}"
       class="text-gray-500 hover:text-gray-700">
      &DoubleLeftArrow; home
    </a>
  </div>
</x-slot>

<div class="flex flex col bg-white min-h-screen">
  <div class="w-4/5 container mx-auto">
    <div>
      <h3 class="text-lg leading-6 font-medium text-gray-900">Ticket</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ '#' .$ticketId->id }}</p>
    </div>
    
    <div class="mt-5 border-t border-gray-200">
      <x-description.list>
        <x-description.item title="Title">
          {{ $ticketId->title }}
        </x-description.item>
        <x-description.item title="Description">
          {{ $ticketId->description }}
        </x-description.item>
        <x-description.item title="Issued at">
          {{ $ticketId->created_at }}
        </x-description.item>
      </x-description.list>
    </div>
  </div>
</div>

