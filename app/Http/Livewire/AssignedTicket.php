<?php

namespace App\Http\Livewire;

use App\Models\AssignedTo;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Assigned tickets Livewire component.
 *
 * For the tickets assigned to employee by manager or admin
 * 
 * @author Hussain Aljassim
 */
class AssignedTicket extends Component {
  use withPagination;
  
  public function render() {
    $assigned = AssignedTo::where('user_id', auth()->user()->id)->get();
    $tickets = [];

    foreach($assigned as $ticket) {
      array_push($tickets, Ticket::whereId($ticket->ticket_id)->first());
    }
    
    return view('livewire.assigned-ticket', [
      'tickets' => $tickets
    ]);
  }
}
