<x-slot name="header">
  <div class="flex justify-between mb-7">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Ticket') .' Details' }}
    </h2>
    <a href="{{ route('ticket-list') }}"
       class="text-gray-500 hover:text-gray-700">
      &DoubleLeftArrow; home
    </a>
  </div>
</x-slot>

<div class="grid grid-cols-4 min-h-screen bg-white col px-20">
  <div class="container mx-auto col-span-2">
    <div>
      <h3 class="text-lg font-medium leading-6 text-gray-900">Ticket</h3>
      <p class="max-w-2xl mt-1 text-sm text-gray-500">{{ '#' .$ticketId->id }}</p>
    </div>
    
    <div class="mt-5 border-t border-gray-200">
      <x-description.list>
        @role('admin')
        <x-description.item title="User">
          {{ \App\Models\User::whereId($ticketId->user_id)->value('name') }}
        </x-description.item>
        <x-description.item title="Email">
          {{ \App\Models\User::whereId($ticketId->user_id)->value('email') }}
        </x-description.item>
        @endrole
        <x-description.item title="Title">
          {{ $ticketId->title }}
        </x-description.item>
        <x-description.item title="Type">
          {{ $ticketId->type->title }}
        </x-description.item>
        <x-description.item title="Priority">
          <x-priority name="{{ $ticket->priority->name }}"/>
        </x-description.item>
        <x-description.item title="Status">
          {{ $ticket->status }}
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
  <div class="ml-10 col-span-2 p-4 rounded-2xl">
    <p class="text-3xl font-bold tracking-wider mb-4">
      Comments
    </p>
    <div class="overflow-x-hidden h-[50vh] p-7 rounded-2xl">
      @if(count($comments))
        @foreach($comments as $comment)
          @if($comment->user->id == \Illuminate\Support\Facades\Auth::id())
            <div class="mb-3">
              <div class="flex">
                <div id="img1"></div>
                <img
                  src={{ asset("avatars/". $comment->user->id % 10 . ".svg") }}
                  alt="avatar"
                  class="h-12">
                
                <div class="ml-2.5">
                  <strong class="tracking-wide">{{ $comment->user->name }}</strong>
                  <time class="block text-sm mt-0.5 text-gray-600">
                    {{ \Carbon\Carbon::create($comment->created_at)->diffForHumans() }}
                  </time>
                </div>
              </div>
              <div id="comment"
                   class="pt-3 text-gray-600 rounded-2xl text-lg w-auto mb-2">
                <p class="break-words">{{ $comment->text }}</p>
              </div>
            </div>
            <x-jet-section-border />
          @else
            <div class="mb-3">
              <div class="flex">
                <img
                  src={{ asset("avatars/". $comment->user->id % 10 . ".svg") }}
                  alt="avatar"
                  class="h-12">
                <div class="ml-2.5">
                  <strong class="tracking-wide">{{ $comment->user->name }}</strong>
                  <time class="block text-sm mt-0.5 text-gray-600">
                    {{ \Carbon\Carbon::create($comment->created_at)->diffForHumans() }}
                  </time>
                </div>
              </div>
              <div id="comment"
                   class="pt-3 text-gray-600 rounded-2xl text-lg w-auto mb-2">
                <p class="break-words">{{ $comment->text }}</p>
              </div>
            </div>
            <x-jet-section-border />
          @endif
        @endforeach
      @else
        <p class="text-2xl">No comments on this ticket</p>
      @endif
    </div>
    <div id="addComment" class="mt-3">
      <x-textarea name="comment" model="comment" class="text-xl" />
      <x-form.error for="comment" />
      <button wire:click.prevent="addComment" class="mt-3 bg-gray-700 text-white p-3.5
      rounded-2xl
      text-xl
      hover:bg-gray-900
      transition-all duration-200">
        Submit comment
      </button>
    </div>
  </div>
</div>