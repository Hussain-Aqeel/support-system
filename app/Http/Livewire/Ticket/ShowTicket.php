<?php

namespace App\Http\Livewire\Ticket;

use \App\Models\Ticket;
use Livewire\Component;

class ShowTicket extends Component {
  public Ticket $ticketId;
  
  public function render() {
    return view('livewire.ticket.show', [
      'ticketId' => $this->ticketId
    ]);
  }
}
