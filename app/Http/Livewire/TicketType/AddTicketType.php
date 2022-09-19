<?php

namespace App\Http\Livewire\TicketType;

use App\Models\Department;
use App\Models\TicketType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTicketType extends Component {
    public $department;
    public $title;
    public $status;

    protected $rules = [
    'title' => 'bail|required',
    'department' => 'bail|required',
    'status' => 'required'];

    public function mount() {
      if(Auth::user()->hasRole('manager')) {
        $this->department = auth()->user()->department_id;
      }
    }

    public function render() {
      if(Auth::user()->hasRole('admin')) {
        return view('livewire.ticket-type.create', [
          'departments' => Department::all()
        ]);
      }
      return view('livewire.ticket-type.manager-create');
    }

    public function save() {
        // Validation here
        $this->validate();

        TicketType::create([
      'department_id' => $this->department,
      'title' => $this->title,
      'status' => $this->status,
      ]);

        session()->flash('message', 'new ticket type is added successfully');

        // redirect to ticket list
        return redirect()->route('ticket-type-list');
    }

    public function cancel() {
        // redirect to ticket list
        return redirect()->route('ticket-type-list');
    }
}
