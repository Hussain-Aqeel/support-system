<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component {
    public Department $departmentId;

    public function render() {
        return view('livewire.admin.department.show', [
      'departmentId' => $this->departmentId
    ]);
    }
}
