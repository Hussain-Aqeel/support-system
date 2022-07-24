<x-slot name="header">
  <div class="mb-7 flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Department Details') }}
    </h2>
    <a href="{{ route('departments') }}"
       class="text-gray-500 hover:text-gray-700">
      &DoubleLeftArrow; home
    </a>
  </div>
</x-slot>

<div class="flex flex col bg-white min-h-screen">
  <div class="w-4/5 container mx-auto">
    <div>
      <h3 class="text-lg leading-6 font-medium text-gray-900">Department</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ '#' .$departmentId->id }}</p>
    </div>
    
    <div class="mt-5 border-t border-gray-200">
      <x-description.list>
        <x-description.item title="Name">
          {{ $departmentId->name }}
        </x-description.item>
        <x-description.item title="Email">
          {{ $departmentId->email }}
        </x-description.item>
        <x-description.item title="Status">
          {{ $departmentId->status ? 'Active' : 'Inactive' }}
        </x-description.item>
      </x-description.list>
    </div>
  </div>
</div>
