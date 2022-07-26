<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component {
  use WithPagination;
  
  public function render() {
  
    $departments =  Department::paginate(2);
    
    return view(
      'livewire.admin.department.list', ['departments' => $departments ]
    );
  }
  
  public function addDepartment() {
    // redirect to add department view
    return redirect()->route('add-department');
  }
}
