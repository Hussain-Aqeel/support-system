<?php

namespace App\Http\Livewire\admin\TicketType;

use App\Models\Department;
use App\Models\TicketType;
use Livewire\Component;

class EditTicketType extends Component {
    public TicketType $ticketTypeId;
    public $title;
    public $department;
    public $status;

    protected $rules = [
    'title' => 'bail|required',
    'department' => 'bail|required',
    'status' => 'required'
  ];

    public function render() {
        return view('livewire.ticket-type.edit', [
        'departments' => Department::all()
      ]);
    }

    public function mount() {
        $this->title = $this->ticketTypeId->title;
        $this->department = $this->ticketTypeId->department->id;
        $this->status = $this->ticketTypeId->status;
    }

    public function update() {
        // Validation here
        $this->validate();

        $this->ticketTypeId->update([
      'title' => $this->title,
      'status' => $this->status,
      'department_id' => $this->department
    ]);

        session()->flash('message', 'ticket type is successfully updated');

        // redirect to ticket list
        return redirect()->route('admin-ticket-type-list');
    }

    public function cancel() {
        return redirect()->route('admin-ticket-type-list');
    }
}
