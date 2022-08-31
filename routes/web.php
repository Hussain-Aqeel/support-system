<?php
  
  use App\Http\Livewire\admin\Ticket\{
    CreateTicket as AdminCreateTicket,
    EditTicket as AdminEditTicket,
    ShowTicket as AdminShowTicket,
    TicketList as AdminTicketList
  };
  
  use App\Http\Livewire\admin\TicketType\{
    AddTicketType as AdminAddTicketType,
    EditTicketType as AdminEditTicketType,
    TicketTypeList as AdminTicketTypeList
  };
  
  use App\Http\Livewire\admin\Department\{
    CreateDepartment as AdminCreateDepartment,
    DepartmentList as AdminDepartmentList,
    EditDepartment as AdminEditDepartment,
    ShowDepartment as AdminShowDepartment
  };
  
  // Manager
  use App\Http\Livewire\manager\Ticket\{
    CreateTicket as ManagerCreateTicket,
    EditTicket as ManagerEditTicket,
    ShowTicket as ManagerShowTicket,
    TicketList as ManagerTicketList
  };
  
  use App\Http\Livewire\manager\TicketType\{
    AddTicketType as ManagerAddTicketType,
    EditTicketType as ManagerEditTicketType,
    TicketTypeList as ManagerTicketTypeList
  };
  
  use App\Http\Livewire\employee\Ticket\{
    CreateTicket as EmployeeCreateTicket,
    EditTicket as EmployeeEditTicket,
    ShowTicket as EmployeeShowTicket,
    TicketList as EmployeeTicketList
  };
  
  use Illuminate\Support\Facades\Route;

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
      
      Route::group([
        'middleware' => ['role:employee'],
        'prefix' => 'employee',
        'as' => 'employee'
      ], function() {
        // Tickets
        Route::get('ticket/{ticketId}', EmployeeShowTicket::class)
          ->whereNumber('ticketId')
          ->name('-show-ticket');
        Route::get('ticket-add', EmployeeCreateTicket::class)
          ->name('-add-ticket');
        Route::get('ticket-edit/{ticketId}', EmployeeEditTicket::class)
          ->whereNumber('ticketId')
          ->name('-edit-ticket');
        Route::get('ticket-list', EmployeeTicketList::class)
          ->name('-ticket-list');
      });
  
      Route::group([
        'middleware' => ['role:manager'],
        'prefix' => 'manager',
        'as' => 'manager'
      ], function() {
        
        // Ticket types
        Route::get('ticket-type', ManagerTicketTypeList::class)
          ->name('-ticket-type-list');
        Route::get('add-type', ManagerAddTicketType::class)
          ->name('-add-ticket-type');
        Route::get('ticket-type-edit/{ticketTypeId}', ManagerEditTicketType::class)
          ->whereNumber('ticketTypeId')
          ->name('-edit-ticket-type');
    
        // tickets
        Route::get('ticket/{ticketId}', ManagerShowTicket::class)
          ->whereNumber('ticketId')
          ->name('-show-ticket');
        Route::get('ticket-add', ManagerCreateTicket::class)
          ->name('-add-ticket');
        Route::get('ticket-edit/{ticketId}', ManagerEditTicket::class)
          ->whereNumber('ticketId')
          ->name('-edit-ticket');
        Route::get('ticket-list', ManagerTicketList::class)
          ->name('-ticket-list');
      });
      
      Route::group([
        'middleware' => ['role:admin'],
        'prefix' => 'admin',
        'as' => 'admin'
      ], function() {
        
        // tickets
        Route::get('ticket/{ticketId}', AdminShowTicket::class)
          ->whereNumber('ticketId')
          ->name('-show-ticket');
        Route::get('ticket-add', AdminCreateTicket::class)
          ->name('-add-ticket');
        Route::get('ticket-edit/{ticketId}', AdminEditTicket::class)
          ->whereNumber('ticketId')
          ->name('-edit-ticket');
        Route::get('ticket-list', AdminTicketList::class)
          ->name('-ticket-list');
        
        // Ticket types
        Route::get('ticket-type', AdminTicketTypeList::class)
          ->name('-ticket-type-list');
        Route::get('add-type', AdminAddTicketType::class)
          ->name('-add-ticket-type');
        Route::get('ticket-type-edit/{ticketTypeId}', AdminEditTicketType::class)
          ->whereNumber('ticketTypeId')
          ->name('-edit-ticket-type');
        
        // departments
        Route::get('department-list', AdminDepartmentList::class)
          ->name('-department-list');
        Route::get('department/{departmentId}', AdminShowDepartment::class)
          ->whereNumber('departmentId')
          ->name('-show-department');
        Route::get('department-add', AdminCreateDepartment::class)
          ->name('-add-department');
        Route::get('department-edit/{departmentId}', AdminEditDepartment::class)
          ->whereNumber('departmentId')
          ->name('-edit-department');
      });
  });
