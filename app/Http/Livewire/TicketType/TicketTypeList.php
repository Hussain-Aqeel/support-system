<?php

namespace App\Http\Livewire\TicketType;

use App\Models\TicketType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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

    public function resetSearch() {
        $this->reset(['searchID', 'searchTitle', 'searchDepartment', 'searchStatus']);
    }

    public function addType() {
        // redirect to add ticket view
        return redirect()->route('add-ticket-type');
    }
  
  public function toggleSearchBox() {
    $this->showSearchBox = !$this->showSearchBox;
  }
}
