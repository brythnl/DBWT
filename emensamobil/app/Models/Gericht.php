<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gericht extends Model
{
  protected $table = 'gericht';
  protected $primaryKey = 'id';
  public $incrementing = false;
}
