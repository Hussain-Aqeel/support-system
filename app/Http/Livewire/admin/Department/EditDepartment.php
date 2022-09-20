<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

/**
 * Edit department Livewire component.
 *
 * @author Hussain Aljassim
 */
class EditDepartment extends Component {
  public Department $departmentId;
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
  'email' => 'bail|required|email',
  'status' => 'required'
  ];

  public function mount() {
    $this->name = $this->departmentId->name;
    $this->email = $this->departmentId->email;
    $this->status = $this->departmentId->status;
  }
  
  public function render() {
    return view('livewire.admin.department.edit');
  }

  /**
   * Update department
   *
   * this method will update the modified department in the database after the validation.
   *
   * @return RedirectResponse
   */
  public function update() {
    $this->validate();

    $this->departmentId->update([
      'name' => $this->name,
      'email' => $this->email,
      'status' => $this->status
    ]);

    session()->flash('message', 'department is successfully updated');

    // redirect to ticket list
    return redirect()->route('admin-department-list');
  }

  /**
   * Cancel editing
   *
   * this method will redirect to department list
   *
   * @return RedirectResponse
   */
  public function cancel() {
    return redirect()->route('admin-department-list');
  }
}
