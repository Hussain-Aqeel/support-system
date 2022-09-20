<?php

namespace App\Http\Livewire\TicketType;

use App\Models\TicketType;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

/**
 * Edit Ticket type Livewire component.
 *
 * @author Hussain Aljassim
 */
class EditTicketType extends Component {
  public TicketType $ticketTypeId;
  public $title;
  public $status;
  
  /**
   * Validation rules
   *
   * @var string[]
   */
  protected $rules = [
    'title' => 'bail|required',
    'status' => 'required'
  ];
  
  public function mount() {
    $this->title = $this->ticketTypeId->title;
    $this->status = $this->ticketTypeId->status;
  }
  
  public function render() {
    return view('livewire.ticket-type.edit');
  }
  
  /**
   * Update ticket type
   *
   * this method will update the modified type in the database after the validation.
   *
   * @return RedirectResponse
   */
  public function update() {
    $this->validate();

    $this->ticketTypeId->update([
      'title' => $this->title,
      'status' => $this->status,
    ]);

    session()->flash('message', 'ticket type is successfully updated');

    // redirect to ticket list
    return redirect()->route('ticket-type-list');
  }
  
  /**
   * Cancel editing
   *
   * this method will redirect to types list
   *
   * @return RedirectResponse
   */
  public function cancel() {
    return redirect()->route('ticket-type-list');
  }
}
