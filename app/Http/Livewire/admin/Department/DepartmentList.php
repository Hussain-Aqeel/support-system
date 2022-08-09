<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component {
  use WithPagination;
  public $searchID;
  public $searchName;
  public $searchEmail;
  public $searchStatus;
  
  public function render() {
  
    $departments = Department::where('id', 'like', '%'.$this->searchID.'%')
      ->where('name', 'like', '%'.$this->searchName.'%')
      ->where('email', 'like', '%'.$this->searchEmail.'%')
      ->where('status', 'like', '%'.$this->searchStatus.'%')
      ->paginate(2);
    
    return view(
      'livewire.admin.department.list', ['departments' => $departments ]
    );
  }
  
  public function resetSearch() {
    if($this->searchID !== '' ||
      $this->searchName !== '' ||
      $this->searchEmail !== '' ||
      $this->searchStatus !== '') {
      
      $this->searchID = '';
      $this->searchName = '';
      $this->searchEmail = '';
      $this->searchStatus = '';
    }
  }
  
  public function addDepartment() {
    // redirect to add department view
    return redirect()->route('add-department');
  }
}
