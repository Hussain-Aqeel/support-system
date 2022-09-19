<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketList extends Component {
    use WithPagination;
    public $showSearchBox = false;
    public $searchID;
    public $searchUser;
    public $searchType;
    public $searchTitle;
    public $searchDescription;
    public $searchPriority;
    public $searchStatus;

    public function render() {
        if (Auth::user()->hasRole('admin')) {
            $tickets = Ticket::where('id', 'like', '%'.$this->searchID.'%')
          ->where('title', 'like', '%'.$this->searchTitle.'%')
          ->where('description', 'like', '%'.$this->searchDescription.'%')
          ->where('status', 'like', '%'.$this->searchStatus.'%')
          ->whereHas('type', function ($query) {
            return $query->where('title', 'like', '%'.$this->searchType.'%');
          })
          ->whereHas('priority', function ($query) {
            return $query->where('name', 'like', '%'.$this->searchPriority.'%');
          })
          ->paginate(10);
        } else if (Auth::user()->hasRole('manager')) {
          $tickets = Ticket::where('id', 'like', '%'.$this->searchID.'%')
            ->where('title', 'like', '%'.$this->searchTitle.'%')
            ->where('description', 'like', '%'.$this->searchDescription.'%')
            ->where('status', 'like', '%'.$this->searchStatus.'%')
            ->whereHas('type', function ($query) {
              return $query->where('title', 'like', '%'.$this->searchType.'%');
            })
            ->whereHas('priority', function ($query) {
              return $query->where('name', 'like', '%'.$this->searchPriority.'%');
            })
            ->whereHas('type', function ($query) {
              return $query->whereHas('department', function ($query) {
                return $query->whereId(auth()->user()->department_id);
              });
            })
            ->paginate(10);
          
        } else {
            $tickets = Ticket::where('user_id', Auth::id())
          ->where('id', 'like', '%'.$this->searchID.'%')
          ->where('title', 'like', '%'.$this->searchTitle.'%')
          ->where('description', 'like', '%'.$this->searchDescription.'%')
          ->where('status', 'like', '%'.$this->searchStatus.'%')
          ->whereHas('type', function ($query) {
            return $query->where('title', 'like', '%'.$this->searchType.'%');
          })
          ->whereHas('priority', function ($query) {
            return $query->where('name', 'like', '%'.$this->searchPriority.'%');
          })
          ->paginate(10);
        }

        return view(
            'livewire.ticket.list',
            [ 'tickets' => $tickets]
        );
    }

    public function resetSearch() {
        $this->reset([
          'searchID',
          'searchUser',
          'searchType',
          'searchTitle',
          'searchDescription',
          'searchPriority',
          'searchStatus'
        ]);
    }

    public function addTicket() {
        // redirect to add ticket view
        return redirect()->route('add-ticket');
    }
    
    public function toggleSearchBox() {
      $this->showSearchBox = !$this->showSearchBox;
    }
}
