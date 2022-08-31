<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model {
    use HasFactory;

    protected $guarded = [];

    protected $with = ['department'];

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
