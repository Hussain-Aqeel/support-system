<x-slot name="header">
  <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit ticket') }}
    </h2>
  </div>
</x-slot>

<div class="flex flex-col min-h-screen lg:w-screen bg-white mb-6">
  <form wire:submit.prevent="update" class="w-4/5 self-center mt-3.5">
    
    <div>
      <div class="grid grid-cols-1 gap-y-6 gap-x-4">
        <div class="sm:col-span-4">
          
          <div class="mt-1 md:w-1/2 lg:w-2/5">
            <x-form.label>Title</x-form.label>
            <x-input name="title" class="mb-3" model="title" />
            <x-form.error for="title" />
          </div>
          
          <div class="mt-1 md:w-1/2 lg:w-2/5">
            <x-form.label>Description</x-form.label>
            <x-textarea name="description" class="mb-3" model="description">
            </x-textarea>
            <x-form.error for="description" />
          </div>
        </div>
      
      </div>
      <div class="pt-5">
        <div class="flex justify-start">
          <x-buttons.btn color="red" wire:click="cancel">Cancel</x-buttons.btn>
          <x-buttons.btn color="sky" type="submit" class="ml-2.5">Save</x-buttons.btn>
        </div>
      </div>
    </div>
  </form>
</div>