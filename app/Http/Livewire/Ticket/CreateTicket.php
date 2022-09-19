<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Document;
use App\Models\Priority;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Hashids\Hashids;

class CreateTicket extends Component {
  use WithFileUploads;
  private $hashids;
  
    public $title;
    public $priority;
    public $description;
    public $type;
    public $file;

    protected $rules = [
    'title' => 'bail|required',
    'description' => 'bail|required',
    'type' => 'required',
    'priority' => 'required',
    'file' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:69000'
  ];

    public function render() {
        return view('livewire.ticket.create', [
        'types' => TicketType::all(),
          'priorities' => Priority::all()
      ]);
    }

    public function save() {
        // Validation here
        $this->validate();
        
        $ticket = Ticket::create([
          'key' => Str::uuid(),
          'user_id' => Auth::id(),
          'ticket_type_id' => $this->type,
          'title' => $this->title,
          'description' => $this->description,
          'priority_id' => $this->priority
        ]);
        
        Document::create([
          'title' => $this->title,
          'file_name' => $this->file->store('documents','public'),
          'ticket_id' => $ticket->id
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
            function ($message) use ($to_name, $to_email) {
                $message
                ->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
                $message->from(config('app.mailer'), 'Test Mail');
            }
        );

        // redirect to ticket list
        return redirect()->route('ticket-list');
    }

    public function cancel() {
        // redirect to ticket list
        return redirect()->route('ticket-list');
    }
}