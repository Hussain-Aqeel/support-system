<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'title',
    'description',
    'key',
    'user_id',
    'ticket_type_id'
  ];
  
  // Eager loading: to always get type with queries, for fast and fewer queries.
  protected $with = ['type'];
  
  public function type() {
    return $this->belongsTo(TicketType::class, 'ticket_type_id');
  }
  
}
