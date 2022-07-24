<x-slot name="header">
  <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New ticket') }}
    </h2>
  </div>
</x-slot>

<div class="flex flex-col min-h-screen lg:w-screen bg-white mb-6">
  <form wire:submit.prevent="save" class="w-4/5 self-center">
    
    @if ($errors->any())
      <div class="bg-red-400 rounded-md p-3 mb-2">
        <ul>
          @foreach ($errors->all() as $error)
            <li class="text-white">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    <div class="">
      <div class="grid grid-cols-1 gap-y-6 gap-x-4">
        <div class="sm:col-span-4">
          <x-form.label>Title</x-form.label>
          <div class="mt-1">
            <x-input name="title" model="title" class="mb-3" />
          </div>
  
          <x-form.label>Description</x-form.label>
          <div class="mt-1">
            <x-textarea name="description" model="description" />
          </div>
        </div>
      
      </div>
      <div class="pt-5">
        <div class="flex justify-start">
          <x-buttons.btn color="white" wire:click="cancel">Cancel</x-buttons.btn>
          <x-buttons.btn color="sky" type="submit" class="ml-2.5">Submit</x-buttons.btn>
        </div>
      </div>
    </div>
  </form>
</div>
