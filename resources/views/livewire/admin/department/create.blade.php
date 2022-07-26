<x-slot name="header">
  <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Department') }}
    </h2>
  </div>
</x-slot>

<div class="flex flex-col min-h-screen lg:w-screen bg-white mb-6">
  <form wire:submit.prevent="save" class="w-4/5 self-center mt-3.5">
    <div class="">
      <div class="grid grid-cols-1 gap-y-6 gap-x-4">
        <div class="sm:col-span-2">
          <div class="mt-1 md:w-1/2 lg:w-2/5">
            <x-form.label>Name</x-form.label>
            <x-input name="name" model="name" />
            <x-form.error for="name" />
          </div>
          
          <div class="mt-4 md:w-1/2 lg:w-2/5">
            <x-form.label>Email</x-form.label>
            <x-input name="email" model="email" type="email" />
            <x-form.error for="email" />
          </div>
  
          <div class="mt-4">
            <x-form.label>Status</x-form.label>
            <x-form.radio-container>
              <x-form.radio-btn
                group="status" name="active" value="1" model="status" checked />
              <x-form.radio-btn group="status" name="inactive" value="0" model="status" />
            </x-form.radio-container>
            <x-form.error for="status" />
          </div>
        </div>
      
      </div>
      <div class="pt-5">
        <div class="flex justify-start">
          <x-buttons.btn color="red" wire:click="cancel">Cancel</x-buttons.btn>
          <x-buttons.btn color="sky" type="submit" class="ml-2.5">Submit</x-buttons.btn>
        </div>
      </div>
    </div>
  </form>
</div>

