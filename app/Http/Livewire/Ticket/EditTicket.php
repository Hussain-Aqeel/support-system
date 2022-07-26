<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class EditTicket extends Component {
  public Ticket $ticketId;
  public $title;
  public $description;
  
  protected $rules = [
    'title' => 'bail|required',
    'description' => 'bail|required'
  ];
  
  public function mount() {
    $this->title = $this->ticketId->title;
    $this->description = $this->ticketId->description;
  }
  
  public function render() {
    return view('livewire.ticket.edit');
  }
  
  public function update() {
    // Validation here
    $this->validate();
    
    $this->ticketId->update([
      'title' => $this->title,
      'description' => $this->description
    ]);
    
    // redirect to ticket list
    return redirect()->route('ticket-list');
  }
  
  public function cancel() {
    return redirect()->route('ticket-list');
  }
}
