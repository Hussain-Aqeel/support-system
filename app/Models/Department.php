<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model {
  use HasFactory;

  // This is the opposite of fillable, it will prevent the explicitly chosen values to be
  // mass assigned.
  protected $guarded = [
    'id'
  ];
  
  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
    'email',
    'status'
  ];
  
  public function types() {
    return $this->hasMany(TicketType::class);
  }
}
