<?php
  
  use App\Http\Livewire\Ticket\EditTicket;
  use App\Http\Livewire\admin\Department\{CreateDepartment,
    DepartmentList,
    EditDepartment,
    ShowDepartment};
  use App\Http\Livewire\Ticket\CreateTicket;
  use App\Http\Livewire\Ticket\ShowTicket;
  use App\Http\Livewire\Ticket\TicketList;
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
])->group(function () {
  // Tickets
  Route::get('ticket/{ticketId}', ShowTicket::class)
    ->name('show-ticket');
  Route::get('ticket-add', CreateTicket::class)
    ->name('add-ticket');
  Route::get('ticket-edit/{ticketId}', EditTicket::class)
    ->name('edit-ticket');
  Route::get('ticket-list', TicketList::class)
    ->name('ticket-list');
  
  // Departments
  Route::get('department-list', DepartmentList::class)
    ->name('department-list');
  Route::get('department/{departmentId}', ShowDepartment::class)
    ->name('show-department');
  Route::get('department-add', CreateDepartment::class)
    ->name('add-department');
  Route::get('department-edit/{departmentId}', EditDepartment::class)
    ->name('edit-department');
});
