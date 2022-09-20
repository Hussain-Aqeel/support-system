<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

/**
 * Display ticket Livewire component.
 *
 * @author Hussain Aljassim
 */
class ShowTicket extends Component {
  public $ticketKey;
  public Ticket $ticket;
  public $comment;
  public $time;
  
  public function mount() {
    $this->ticket = Ticket::where('key', $this->ticketKey)->first();
  }
  
  public function render() {
    return view('livewire.ticket.show', [
      'ticketId' => $this->ticket,
        'comments' => Comment::where('ticket_id', $this->ticket->id)->get(),
    ]);
  }
  
  /**
   * Adding a comment to a ticket
   *
   * This method is responsible for submitting a new comment to a ticket
   *
   * @return void
   */
  public function addComment() {
    if($this->comment != '') {
      $comment = Comment::create([
        'text' => $this->comment,
        'ticket_id' => $this->ticket->id,
        'user_id' => Auth::id(),
      ]);

      $this->reset(['comment']);
    }
  }
}
