<?php
  
  use App\Http\Livewire\admin\TicketType\AddTicketType;
  use App\Http\Livewire\admin\TicketType\TicketTypeList;
  use App\Http\Livewire\Ticket\EditTicket;
  
  use App\Http\Livewire\admin\Department\{CreateDepartment,
    DepartmentList,
    EditDepartment,
    ShowDepartment};
    use Illuminate\Support\Facades\Route;
    use App\Http\Livewire\Ticket\CreateTicket;
    use App\Http\Livewire\Ticket\ShowTicket;
    use App\Http\Livewire\Ticket\TicketList;
    
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
])->group(function () {
  // Tickets
  Route::get('ticket/{ticketId}', ShowTicket::class)
    ->whereNumber('ticketId')
    ->name('show-ticket');
  Route::get('ticket-add', CreateTicket::class)
    ->name('add-ticket');
  Route::get('ticket-edit/{ticketId}', EditTicket::class)
    ->whereNumber('ticketId')
    ->name('edit-ticket');
  Route::get('ticket-list', TicketList::class)
    ->name('ticket-list');
  Route::get('ticket-types', TicketTypeList::class)
    ->name('ticket-types-list');
  Route::get('add-type', AddTicketType::class)
    ->name('add-ticket-type');

  // TODO: add route resource. i.e /admin/department-list
  // Departments
  Route::get('department-list', DepartmentList::class)
    ->name('department-list');
  Route::get('department/{departmentId}', ShowDepartment::class)
    ->whereNumber('departmentId')
    ->name('show-department');
  Route::get('department-add', CreateDepartment::class)
    ->name('add-department');
  Route::get('department-edit/{departmentId}', EditDepartment::class)
    ->whereNumber('departmentId')
    ->name('edit-department');
});
