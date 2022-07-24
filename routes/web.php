<?php
  
  use App\Http\Livewire\Departments\CreateDepartment;
  use App\Http\Livewire\Departments\DepartmentList;
use App\Http\Livewire\Ticket\CreateTicket;
use App\Http\Livewire\Ticket\Show;
use App\Http\Livewire\Departments\ShowDepartment;
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
  Route::get('/ticket/{ticketId}', Show::class)->name('showTicket');
  Route::get('/ticket/add', CreateTicket::class)->name('addTicket');
  Route::get('/ticket/list', TicketList::class)->name('list');
  Route::get('/department/list', DepartmentList::class)->name('departments');
  Route::get('/department/{departmentId}', ShowDepartment::class)->name('showDepartment');
  Route::get('/department/add', CreateDepartment::class)->name('addDepartment');
});
