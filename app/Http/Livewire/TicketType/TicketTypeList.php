<?php

namespace App\Http\Livewire\TicketType;

use App\Models\TicketType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Ticket type list Livewire component.
 *
 * @author Hussain Aljassim
 */
class TicketTypeList extends Component {
  use WithPagination;
  
  public $showSearchBox = false;
  public $searchID;
  public $searchDepartment;
  public $searchTitle;
  public $searchStatus;

  public function render() {
    if(Auth::user()->hasRole('admin')) {
      $types = TicketType::where('id', 'like', '%'.$this->searchID.'%')
        ->where('title', 'like', '%'.$this->searchTitle.'%')
        ->where('status', 'like', '%'.$this->searchStatus.'%')
        ->whereHas('department', function ($query) {
          return $query->where('name', 'like', '%'.$this->searchDepartment.'%');
        })->paginate(10);
    } else if(Auth::user()->hasRole('manager')) {
      $types = TicketType::where('id', 'like', '%'.$this->searchID.'%')
        ->where('title', 'like', '%'.$this->searchTitle.'%')
        ->where('status', 'like', '%'.$this->searchStatus.'%')
        ->where('department_id', '=', auth()->user()->department_id)
        ->whereHas('department', function ($query) {
          return $query->where('name', 'like', '%'.$this->searchDepartment.'%');
        })->paginate(10);
    }

    return view('livewire.ticket-type.list', [
      'types' => $types
    ]);
  }
  
  /**
   * Go to adding a new ticket type view
   *
   * this method will redirect to the add new ticket type view
   *
   * @return RedirectResponse
   */
  public function addType() {
    return redirect()->route('add-ticket-type');
  }
  
  /**
   * Reset search fields
   *
   * this method will clear all the search inputs
   *
   * @return void
   */
  public function resetSearch() {
    $this->reset(['searchID', 'searchTitle', 'searchDepartment', 'searchStatus']);
  }
  
  /**
   * Toggle search area
   *
   * this method is responsible for showing and hiding the search area
   * @return void
   */
  public function toggleSearchBox() {
    $this->showSearchBox = !$this->showSearchBox;
  }
}
