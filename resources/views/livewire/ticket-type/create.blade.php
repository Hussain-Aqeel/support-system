<x-slot name="header">
  <div class="flex justify-between">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('New ticket type') }}
    </h2>
  </div>
</x-slot>

<div class="flex flex-col min-h-screen mb-6 bg-white lg:w-screen">
  <form wire:submit.prevent="save" class="w-4/5 self-center mt-3.5">
    <div>
      <div class="grid grid-cols-1 gap-y-6 gap-x-4">
        <div class="sm:col-span-4">
          <div class="mt-1 md:w-1/2 lg:w-2/5">
            <x-form.dropdown label="Department" name="department" label="Department"
                             model="department" placeholder="-- Select department --">
              <option value="" hidden selected>Select department</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
              @endforeach
            </x-form.dropdown>
            <x-form.error for="department" />
          </div>
          
          <div class="mt-1 md:w-1/2 lg:w-2/5">
            <x-form.label>Title</x-form.label>
            <x-input name="title" model="title" />
            <x-form.error for="title" />
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
