<?php

namespace App\Http\Livewire\Ticket;

use \App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
  public Ticket $ticketId;
}
