<x-slot name="header">
  <div class="flex justify-between mb-7">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Ticket') .' Details' }}
    </h2>
    <a href="{{ route('user-ticket-list') }}"
       class="text-gray-500 hover:text-gray-700">
      &DoubleLeftArrow; home
    </a>
  </div>
</x-slot>

<div class="grid grid-cols-4 min-h-screen bg-white col">
  <div class="container w-4/5 mx-auto">
    <div>
      <h3 class="text-lg font-medium leading-6 text-gray-900">Ticket</h3>
      <p class="max-w-2xl mt-1 text-sm text-gray-500">{{ '#' .$ticketId->id }}</p>
    </div>
    
    <div class="mt-5 border-t border-gray-200">
      <x-description.list>
        <x-description.item title="Title">
          {{ $ticketId->title }}
        </x-description.item>
        <x-description.item title="Type">
          {{ $ticketId->type->title }}
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
  <div class="bg-slate-50 rounded-xl">
    <livewire:chat.chat-list />
  </div>
  <div class="h-auto bg-slate-50 rounded-xl col-span-2 mx-7">
    <livewire:chat.chatbox />
    <livewire:chat.send-message />
  </div>
</div>

