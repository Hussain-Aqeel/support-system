<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

/**
 * Create Department Livewire component.
 *
 * @author Hussain Aljassim
 */
class CreateDepartment extends Component {
  public $name;
  public $email;
  public $status;
  
  /**
   * Validation rules
   *
   * @var string[]
   */
  protected $rules = [
  'name' => 'bail|required',
  'email' => 'bail|email|required',
  'status' => 'required'
  ];
  
  public function render() {
    return view('livewire.admin.department.create');
  }
  
  /**
   * save department.
   * this method is responsible for validating and saving a new department.
   *
   * @return RedirectResponse
   */
  public function save() {
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
  
  /**
   * Cancel creating new department
   *
   * this method will redirect to the list of department.
   * @return RedirectResponse
   */
  public function cancel() {
    return redirect()->route('admin-department-list');
  }
}
