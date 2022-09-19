<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

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

        return view(
            'livewire.admin.department.list',
            ['departments' => $departments ]
        );
    }

    public function resetSearch() {
        $this->reset(['searchID', 'searchName', 'searchEmail', 'searchStatus']);
    }

    public function addDepartment() {
        // redirect to add department view
        return redirect()->route('admin-add-department');
    }
  
  public function toggleSearchBox() {
    $this->showSearchBox = !$this->showSearchBox;
  }
}
