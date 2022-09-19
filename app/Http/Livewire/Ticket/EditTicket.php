<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Priority;
use App\Models\Ticket;
use App\Models\TicketType;
use Livewire\Component;

class EditTicket extends Component {
    public Ticket $ticketId;
    public $title;
    public $description;
    public $ticketType;
    public $type;
    public $ticketPriority;
    public $priority;
    public $status;

    protected $rules = [
        'title' => 'bail|required',
        'description' => 'bail|required',
        'type' => 'required',
        'priority' => 'required',
        'status' => 'required'
    ];

    public function mount() {
        $this->title = $this->ticketId->title;
        $this->description = $this->ticketId->description;
        $this->ticketType = $this->ticketId->type;
        $this->type = $this->ticketId->type->id;
        $this->ticketPriority = $this->ticketId->priority;
        $this->priority = $this->ticketId->priority->id;
        $this->status = $this->ticketId->status;
    }

    public function render() {
        return view('livewire.ticket.edit', [
          'types' => TicketType::all(),
          'priorities' => Priority::all()
        ]);
    }

    public function update() {
        // Validation here
        $this->validate();

        $this->ticketId->update([
            'title' => $this->title,
            'description' => $this->description,
            'ticket_type_id' => $this->type,
            'status' => $this->status,
            'priority_id' => $this->priority,
        ]);

        session()->flash('message', 'ticket is successfully updated');

        // redirect to ticket list
        return redirect()->route('ticket-list');
    }

    public function cancel() {
        return redirect()->route('ticket-list');
    }
}
