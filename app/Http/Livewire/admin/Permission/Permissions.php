<?php

namespace App\Http\Livewire\admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

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

  public function resetSearch() {
      $this->reset(['searchID', 'searchName']);
  }
  
  public function toggleSearchBox() {
    $this->showSearchBox = !$this->showSearchBox;
  }
}
