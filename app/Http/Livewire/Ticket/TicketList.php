<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketList extends Component {
  use WithPagination;
  public $searchID;
  public $searchTitle;
  public $searchDescription;
  public $searchStatus;
  
  public function render() {
    
    $tickets = Ticket::where('user_id', Auth::id())
      ->where('id', 'like', '%'.$this->searchID.'%')
      ->where('title', 'like', '%'.$this->searchTitle.'%')
      ->where('description', 'like', '%'.$this->searchDescription.'%')
      ->where('status', 'like', '%'.$this->searchStatus.'%')
      ->paginate(2);
    
    return view('livewire.ticket.list',
    [ 'tickets' => $tickets]);
    
  }
  
  public function resetSearch() {
    if($this->searchID !== '' || $this->searchTitle !== '' || $this->searchDescription !== '' || $this->searchStatus !== '') {
      $this->searchID = '';
      $this->searchTitle = '';
      $this->searchDescription = '';
    }
  }
  
  public function addTicket() {
    // redirect to add ticket view
    return redirect()->route('add-ticket');
  }
  
}
