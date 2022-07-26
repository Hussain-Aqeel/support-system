<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Departments') }}
      </h2>
    </div>
  </x-slot>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="px-4 pb-14 sm:px-6 lg:px-8 mt-4">
    @if(!$showSearchBox)
      <button
        title="search"
        class="block mb-8 bg-sky-500 hover:bg-sky-600 transition-all duration-200 text-white
       p-4
      rounded-full" wire:click="toggleSearchBox">
        @svg('bi-search')
      </button>
    @endif
  
    @if($showSearchBox)
      <div>
        <div class="flex w-fit items-center justify-between mb-2">
          <button
            title="close"
            class="mb-8 bg-red-400 hover:bg-red-700 transition-all duration-200 text-white
            p-2.5 rounded-full" wire:click="toggleSearchBox">
            @svg('css-close')
          </button>
        </div>
        <x-buttons.btn color="blue" wire:click="resetSearch" class="lg:mr-56 mb-4">
          reset
        </x-buttons.btn>
        <div class="flex w-fit items-center justify-between">
          <div class="grid grid-cols-4 p-2 border-t-2">
            <x-search model="searchID" placeholder="Search by ID" name="ID"/>
            <x-search model="searchName" placeholder="Search by name" name="name"/>
            <x-search model="searchEmail" placeholder="Search by email" name="email"/>
            <x-search model="searchStatus"
                      placeholder="Search by status; (1 = active) (0 = inactive)"
                      name="status"/>
          </div>
        </div>
      </div>
    @endif
  
    <x-buttons.btn color="sky" wire:click="addDepartment"
                   class="mt-5 mr-4">
      Add Department
    </x-buttons.btn>
      
    @if(count($departments))
      <div class="flex flex-col mt-8">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            <x-table.headings>Name</x-table.headings>
            <x-table.headings>Email</x-table.headings>
            <x-table.headings>Status</x-table.headings>
            <x-table.headings>Actions</x-table.headings>
          </x-slot:head>
          <x-slot:body>
            @foreach($departments as $department)
              <x-table.row>
                <x-table.cell>{{ $department->id }}</x-table.cell>
                <x-table.cell>{{ $department->name }}</x-table.cell>
                <x-table.cell>{{ $department->email }}</x-table.cell>
                <x-table.cell>
                  {{ $department->status ? 'Active' : 'Inactive' }}
                </x-table.cell>
                <x-table.cell>
                  <a
                    href="{{ route('admin-show-department', [ 'departmentId' =>
                    $department->id ])
                     }}"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:w-auto">Show</a>
                  <a href="{{ route('admin-edit-department', [ 'departmentId' =>
                  $department->id ]) }}"
                     class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-emerald-700 hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 sm:w-auto">Edit</a>
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
    <h3 class="leading-3 mt-7">You haven't issued any tickets.</h3>
  @endif
</div>
</div>

{{--Scripts--}}
@push('modals')
    <script>
      setTimeout(() => {
        document.getElementById('alert').style.display = 'none';
      }, 3500)
    </script>
@endpush
