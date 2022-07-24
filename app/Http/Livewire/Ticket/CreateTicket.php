<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateTicket extends Component
{
    public $title;
    public $description;
    
    protected $rules = [
      'title' => 'bail|required',
      'description' => 'bail|required'
    ];
  
    public function render() {
        return view('livewire.ticket.create');
    }
    
    public function save() {
      // Validation here
      $this->validate();
      
      Ticket::create([
        'key' => Str::uuid(),
        'user_id' => Auth::id(),
        'title' => $this->title,
        'description' => $this->description,
      ]);
      
      // redirect to ticket list
      return redirect()->route('list');
    }
  
  public function cancel() {
    // redirect to ticket list
    return redirect()->route('list');
  }
}
