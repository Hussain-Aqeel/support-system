<div>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Employees') }}
      </h2>
    </div>
  </x-slot>
  
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="mt-3.5 px-4 sm:px-6 lg:px-8">
{{--    <div class="flex items-center justify-between mb-2">--}}
{{--      <p class="text-xl leading-loose tracking-wide text-gray-700">Search</p>--}}
{{--      <x-buttons.btn color="blue" wire:click="resetSearch" class="lg:mr-56">--}}
{{--        reset--}}
{{--      </x-buttons.btn>--}}
{{--    </div>--}}
{{--    <div class="flex items-center justify-between">--}}
{{--      <div class="flex p-2 border-t-2">--}}
{{--        <x-search model="searchID" placeholder="Search by ID" name="ID"/>--}}
{{--        <x-search model="searchTitle" placeholder="Search by title" name="title"/>--}}
{{--        <x-search model="searchDescription" placeholder="Search by description"--}}
{{--                  name="Description"/>--}}
{{--        <x-search model="searchStatus" placeholder="Search by status"--}}
{{--                  name="status"/>--}}
{{--      </div>--}}
{{--      <x-buttons.btn color="sky" wire:click="addTicket" class="mt-5 mr-4 lg:mr-20">--}}
{{--        Add Ticket--}}
{{--      </x-buttons.btn>--}}
{{--    </div>--}}
    
    @if(count($employees))
      <div class="flex flex-col mt-8">
        <x-table>
          <x-slot:head>
            <x-table.headings>ID</x-table.headings>
            <x-table.headings>Name</x-table.headings>
            <x-table.headings>Email</x-table.headings>
            <x-table.headings>Department</x-table.headings>
            <x-table.headings>Role</x-table.headings>
            <x-table.headings>Status</x-table.headings>
            <x-table.headings>Actions</x-table.headings>
          </x-slot:head>
          <x-slot:body>
            @foreach($employees as $employee)
              <x-table.row>
                <x-table.cell>{{ $employee->id }}</x-table.cell>
                <x-table.cell>
                  {{ $employee->name }}
                </x-table.cell>
                <x-table.cell>{{ $employee->email }}</x-table.cell>
                <x-table.cell>
                  {{ \App\Models\Department::whereId((int)$employee->department_id)->value
                  ('name') }}
                </x-table.cell>
                <x-table.cell>
                  {{ $employee->getRoleNames()->first() }}
                </x-table.cell>
                <x-table.cell>
                  {{ $employee->status == 1 ? 'Active' : 'Inactive'  }}
                </x-table.cell>
                <x-table.cell>
                  @role('admin')
                    @if($employee->status == 1)
                      <x-buttons.btn color="red" wire:click="deactivate({{ $employee->id  }})">
                        Deactivate
                      </x-buttons.btn>
                    @else
                      <x-buttons.btn color="green" wire:click="activate({{ $employee->id  }})">
                        Activate
                      </x-buttons.btn>
                    @endif
                  @endrole
                </x-table.cell>
              </x-table.row>
            @endforeach
          </x-slot:body>
        </x-table>
      </div>
      <div class="mt-3">
        {{ $employees->links() }}
      </div>
  </div>
  @else
    <h3 class="leading-3 mt-7">No users in the database</h3>
  @endif
</div>
</div>

