<?php

namespace App\Http\Livewire\employee\Ticket;

use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateTicket extends Component {
    public $title;
    public $description;
    public $type;

    protected $rules = [
    'title' => 'bail|required',
    'description' => 'bail|required',
    'type' => 'required'
  ];

    public function render() {
        return view('livewire.ticket.create', [
        'types' => TicketType::all()
      ]);
    }

    public function save() {
        // Validation here
        $this->validate();
        Ticket::create([
          'key' => Str::uuid(),
          'user_id' => Auth::id(),
          'ticket_type_id' => $this->type,
          'title' => $this->title,
          'description' => $this->description,
        ]);

        session()->flash('message', 'ticket is added successfully');
  
        // sending email
        $to_name = User::select('name')->where('id', Auth::id())->first()->name;
        $to_email = User::select('email')->where('id', Auth::id())->first()->email;
        
        $data = array(
          'name'=> 'Support system',
          'body' => 'testing sending email to log'
        );
        
        Mail::send(
          'emails.mail',
          $data,
          function($message) use ($to_name, $to_email) {
            $message
              ->to($to_email, $to_name)
              ->subject('Laravel Test Mail');
            $message->from(env('MAIL_USERNAME'),'Test Mail');
          });

        // redirect to ticket list
        return redirect()->route('employee-ticket-list');
    }

    public function cancel() {
        // redirect to ticket list
        return redirect()->route('employee-ticket-list');
    }
}
