<x-slot name="header">
  <div class="flex justify-between mb-7">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Department Details') }}
    </h2>
    <a href="{{ route('admin-department-list') }}"
       class="text-gray-500 hover:text-gray-700">
      &DoubleLeftArrow; home
    </a>
  </div>
</x-slot>

<div class="flex min-h-screen bg-white col">
  <div class="container w-4/5 mx-auto">
    <div>
      <h3 class="text-lg font-medium leading-6 text-gray-900">Department</h3>
      <p class="max-w-2xl mt-1 text-sm text-gray-500">{{ '#' .$departmentId->id }}</p>
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
