<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component {
    public $name;
    public $email;
    public $status;

    protected $rules = [
    'name' => 'bail|required',
    'email' => 'bail|email|required',
    'status' => 'required'
  ];

    public function render() {
        return view('livewire.admin.department.create');
    }

    public function save() {
        // Validation here
        $this->validate();

        Department::create([
      'name' => $this->name,
      'email' => $this->email,
      'status' => $this->status,
    ]);

        session()->flash('message', 'department is added successfully');

        // redirect to department list
        return redirect()->route('admin-department-list');
    }

    public function cancel() {
        // redirect to department list
        return redirect()->route('admin-department-list');
    }
}
