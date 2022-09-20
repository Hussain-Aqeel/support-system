<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Employees list Livewire component.
 *
 * @author Hussain Aljassim
 */
class EmployeesList extends Component {
  use WithPagination;
  
  public function render() {
    if(Auth::user()->hasRole('admin')) {
      $employees = User::where('id', '!=', Auth::id())->paginate(10);
    } else if (Auth::user()->hasRole('manager')) {
      $employees = User::where('id', '!=', Auth::id())
        ->where('department_id', '=', auth()->user()->department_id)
        ->paginate(10);
    }
    return view('livewire.employees-list', [
      'employees' => $employees
    ]);
  }
  
  /**
   * Deactivate user
   *
   * this method is responsible for deactivating users to prevent their access to the system
   *
   * @param $id int   the user id to deactivate
   * @return Application|RedirectResponse|Redirector
   */
  public function deactivate($id) {
    $user = User::where('id',$id);
    $user->update([ 'status'=> 0]);

    session()->flash('message', $user->value('name') .'is successfully deactivated');
    // to refresh the page for the flash message to show
    return redirect(request()->header('Referer'));
  }
  
  /**
   * Reactivate user
   *
   * this method is responsible for reactivating users to regain their access to the system
   *
   * @param $id int   the user id to reactivate
   * @return Application|RedirectResponse|Redirector
   */
  public function activate($id) {
    $user = User::where('id',$id);
    $user->update([ 'status'=> 1]);
    
    session()->flash('message', $user->value('name') .'is successfully activated');
    // to refresh the page for the flash message to show
    return redirect(request()->header('Referer'));
  }
}
