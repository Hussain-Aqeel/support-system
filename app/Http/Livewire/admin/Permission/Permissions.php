<?php

namespace App\Http\Livewire\admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

/**
 * Permissions list Livewire component.
 *
 * @author Hussain Aljassim
 */
class Permissions extends Component {
  use WithPagination;
  
  public $showSearchBox = false;
  public $searchID;
  public $searchName;

  public function render() {
    $permissions = Permission::where('id', 'like', '%'.$this->searchID.'%')
    ->where('name', 'like', '%'.$this->searchName.'%')
    ->paginate(10);
    return view('livewire.admin.permission.permissions', [
      'permissions' => $permissions
    ]);
  }
  
  /**
   * Reset search fields
   *
   * this method will clear all the search inputs
   *
   * @return void
   */
  public function resetSearch() {
    $this->reset(['searchID', 'searchName']);
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
