<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Department list Livewire component.
 *
 * @author Hussain Aljassim
 */
class DepartmentList extends Component {
  use WithPagination;
  
  public $showSearchBox = false;
  public $searchID;
  public $searchName;
  public $searchEmail;
  public $searchStatus;

  public function render() {
    $departments = Department::where('id', 'like', '%'.$this->searchID.'%')
    ->where('name', 'like', '%'.$this->searchName.'%')
    ->where('email', 'like', '%'.$this->searchEmail.'%')
    ->where('status', 'like', '%'.$this->searchStatus.'%')
    ->paginate(10);

    return view('livewire.admin.department.list', [
      'departments' => $departments
    ]);
  }
  
  /**
   * Go to Add new department view
   *
   * this method will redirect to the adding new department view
   *
   * @return RedirectResponse
   */
  public function addDepartment() {
    return redirect()->route('admin-add-department');
  }
  
  /**
   * Reset search fields
   *
   * this method will clear all the search inputs
   *
   * @return void
   */
  public function resetSearch() {
    $this->reset(['searchID', 'searchName', 'searchEmail', 'searchStatus']);
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
