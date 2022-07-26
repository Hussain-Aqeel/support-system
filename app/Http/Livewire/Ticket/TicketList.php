<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketList extends Component {
  use WithPagination;
  
  public function render() {
    
    $tickets =  Ticket::where('user_id', Auth::id())
      ->orderBy('created_at', 'desc');
  
    $tickets = $tickets->paginate(2);
    
    return view('livewire.ticket.list',
    [ 'tickets' => $tickets]);
  }
  
  public function addTicket() {
    // redirect to add ticket view
    return redirect()->route('add-ticket');
  }
}
