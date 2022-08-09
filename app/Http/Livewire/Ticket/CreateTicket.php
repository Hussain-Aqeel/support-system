<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateTicket extends Component {
  
  public $title;
  public $description;
  public $type;
    
  protected $rules = [
    'title' => 'bail|required',
    'description' => 'bail|required',
    'type' => 'required'
  ];
  
  public function render() {
      return view('livewire.ticket.create', [
        'types' => TicketType::all()
      ]);
  }
    
  public function save() {
    // Validation here
    $this->validate();
    
    Ticket::create([
      'key' => Str::uuid(),
      'user_id' => Auth::id(),
      'ticket_type_id' => $this->type,
      'title' => $this->title,
      'description' => $this->description,
    ]);
  
    session()->flash('message', 'ticket is added successfully');
  
    // redirect to ticket list
    return redirect()->route('ticket-list');
  }
  
  public function cancel() {
    // redirect to ticket list
    return redirect()->route('ticket-list');
  }
}
