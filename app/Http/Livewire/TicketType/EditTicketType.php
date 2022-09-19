<?php

namespace App\Http\Livewire\TicketType;

use App\Models\Department;
use App\Models\TicketType;
use Livewire\Component;

class EditTicketType extends Component {
    public TicketType $ticketTypeId;
    public $title;
    public $status;

    protected $rules = [
    'title' => 'bail|required',
    'status' => 'required'
  ];

    public function render() {
        return view('livewire.ticket-type.edit');
    }

    public function mount() {
        $this->title = $this->ticketTypeId->title;
        $this->status = $this->ticketTypeId->status;
    }

    public function update() {
        // Validation here
        $this->validate();

        $this->ticketTypeId->update([
      'title' => $this->title,
      'status' => $this->status,
    ]);

        session()->flash('message', 'ticket type is successfully updated');

        // redirect to ticket list
        return redirect()->route('ticket-type-list');
    }

    public function cancel() {
        return redirect()->route('ticket-type-list');
    }
}
