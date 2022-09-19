<?php




  use App\Http\Livewire\admin\Permission\Permissions;
  
  
  use App\Http\Livewire\AssignedTicket;
  use App\Http\Livewire\EmployeesList;


  use App\Http\Livewire\TicketType\AddTicketType;


  use App\Http\Livewire\TicketType\EditTicketType;


  use App\Http\Livewire\TicketType\TicketTypeList;


  use App\Http\Livewire\admin\Department\{CreateDepartment as AdminCreateDepartment,
      DepartmentList as AdminDepartmentList,
      EditDepartment as AdminEditDepartment,
      ShowDepartment as AdminShowDepartment};


  use App\Http\Livewire\Ticket\{CreateTicket,
      EditTicket,
      ShowTicket,
      TicketList};



  use Illuminate\Support\Facades\Route;

  // Manager




  /*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
  */




  Route::get('/', function () {
      return view('welcome');
  })->name('home');




  Route::middleware([
      'auth:sanctum',
      config('jetstream.auth_session'),
      'verified',
  ])->group(
      function () {
          // Tickets
          Route::get('ticket/show/{ticketKey}', ShowTicket::class)
            ->whereUuid('ticketKey')
            ->name('show-ticket');
          Route::get('ticket/add', CreateTicket::class)
          ->name('add-ticket');
          Route::get('ticket/edit/{ticketId}', EditTicket::class)
          ->whereNumber('ticketId')
          ->name('edit-ticket');
          Route::get('ticket/list', TicketList::class)
          ->name('ticket-list');
          
          Route::get('assigned-tickets', AssignedTicket::class)
            ->name('assigned-tickets');

          // Ticket types
          Route::get('type', TicketTypeList::class)
          ->name('ticket-type-list');
          Route::get('add/type', AddTicketType::class)
          ->name('add-ticket-type');
          Route::get('type/edit/{ticketTypeId}', EditTicketType::class)
          ->whereNumber('ticketTypeId')
          ->name('edit-ticket-type');

          // employees list
          Route::get('employees/list', EmployeesList::class)
          ->name('employees-list');

          Route::group([
          'prefix' => 'admin',
          'as' => 'admin'
        ], function () {
            // departments
            Route::get('department/list', AdminDepartmentList::class)
            ->name('-department-list');
            Route::get('department/{departmentId}', AdminShowDepartment::class)
            ->whereNumber('departmentId')
            ->name('-show-department');
            Route::get('department/add', AdminCreateDepartment::class)
            ->name('-add-department');
            Route::get('department/edit/{departmentId}', AdminEditDepartment::class)
            ->whereNumber('departmentId')
            ->name('-edit-department');

            // Permissions
            Route::get('permissions', Permissions::class)->name('-permissions-list');
        });
      }
  );
