<?php

namespace App\Http\Livewire\manager\TicketType;

use App\Models\Department;
use App\Models\TicketType;
use Livewire\Component;

class AddTicketType extends Component {
    public $department;
    public $title;
    public $status;

    protected $rules = [
    'title' => 'bail|required',
    'department' => 'bail|required',
    'status' => 'required'];


    public function render() {
        return view('livewire.ticket-type.create', [
          'departments' => Department::all()
        ]);
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
        return redirect()->route('manager-ticket-type-list');
    }

    public function cancel() {
        // redirect to ticket list
        return redirect()->route('manager-ticket-type-list');
    }
}
