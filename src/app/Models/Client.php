<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = [
    'name',
    'surname',
    'card_id',
  ];

  public function accounts()
  {
    return $this->hasMany(Account::class, 'client_id', 'id');
  }
}
