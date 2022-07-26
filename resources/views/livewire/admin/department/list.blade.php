<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Departments') }}
      </h2>
    </div>
  </x-slot>
  
  <div class="flex justify-end">
    <x-buttons.btn color="sky" wire:click="addDepartment" class="mr-4 lg:mr-20 mt-5">
      Add Department
    </x-buttons.btn>
  </div>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="px-4 sm:px-6 lg:px-8">
    @if(count($departments))
      <div class="mt-8 flex flex-col">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            <x-table.headings>Name</x-table.headings>
            <x-table.headings>Status</x-table.headings>
            <x-table.headings>Actions</x-table.headings>
          </x-slot:head>
          <x-slot:body>
            @foreach($departments as $department)
              <x-table.row>
                <x-table.cell>{{ $department->id }}</x-table.cell>
                <x-table.cell>{{ $department->name }}</x-table.cell>
                <x-table.cell>
                  {{ $department->status ? 'Active' : 'Inactive' }}
                </x-table.cell>
                <x-table.cell>
                  <a
                    href="{{ route('show-department', [ 'departmentId' => $department->id ])
                     }}"
                    class="inline-flex items-center justify-center rounded-md border
                     border-transparent bg-gray-700 px-4 py-2 text-sm font-medium text-white
                      shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2
                      focus:ring-gray-500 focus:ring-offset-2 sm:w-auto">Show</a>
                  <a href="{{ route('edit-department', [ 'departmentId' => $department->id ]) }}"
                     class="inline-flex items-center justify-center rounded-md border
                     border-transparent bg-emerald-700 px-4 py-2 text-sm font-medium text-white
                      shadow-sm hover:bg-emerald-900 focus:outline-none focus:ring-2
                      focus:ring-emerald-500 focus:ring-offset-2 sm:w-auto">Edit</a>
                </x-table.cell>
              </x-table.row>
            @endforeach
          </x-slot:body>
        </x-table>
      </div>
      <div class="mt-3">
        {{ $departments->links() }}
      </div>
  </div>
  @else
    <h3 class="mt-7 leading-3">You haven't issued any tickets.</h3>
  @endif
</div>
</div>

