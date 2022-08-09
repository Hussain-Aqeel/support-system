<?php

namespace App\Http\Livewire\admin\TicketType;

use App\Models\TicketType;
use Livewire\Component;
use Livewire\WithPagination;

class TicketTypeList extends Component {
  use WithPagination;
  
  public $searchID;
  public $searchDepartment;
  public $searchTitle;
  public $searchStatus;
  
  public function render() {
    
    $types = TicketType::where('id', 'like', '%'.$this->searchID.'%')
      ->where('title', 'like', '%'.$this->searchTitle.'%')
      ->where('status', 'like', '%'.$this->searchStatus.'%')
      ->whereHas('department', function($query){
        return $query->where('name','like', '%'.$this->searchDepartment.'%');
      })->paginate(10);
    
    return view('livewire.admin.ticket-type.list', [
      'types' => $types
    ]);
  }
  
  public function addType() {
    // redirect to add ticket view
    return redirect()->route('add-ticket-type');
  }
}
