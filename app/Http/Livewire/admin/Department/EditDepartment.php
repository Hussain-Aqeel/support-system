<?php

namespace App\Http\Livewire\admin\Department;

use App\Models\Department;
use Livewire\Component;

class EditDepartment extends Component {
  
  public Department $departmentId;
  public $name;
  public $email;
  public $status;
  
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
  
  /**
   * @return Application|Factory|View
   */
  public function render() {
    return view('livewire.admin.department.edit');
  }
  
  /**
   * @return RedirectResponse
   */
  public function update() {
    // Validation here
    $this->validate();
  
    $this->departmentId->update([
      'name' => $this->name,
      'email' => $this->email,
      'status' => $this->status
    ]);
  
    session()->flash('message', 'department is successfully updated');
  
    // redirect to ticket list
    return redirect()->route('department-list');
  }
  
  /**
   * @return RedirectResponse
   */
  public function cancel() {
    return redirect()->route('department-list');
  }
  
}
