<?php

namespace App\Http\Livewire\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component
{
  use WithPagination;
  
  public function render() {
  
    $departments =  Department::paginate(2);
    
    return view('livewire.departments.department-list', ['departments' => $departments ]);
  }
  
  public function addDepartment() {
    // redirect to add department view
    return redirect()->route('addDepartment');
  }
}
