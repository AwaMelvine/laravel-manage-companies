<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'firstName', 'lastName', 'email', 'phone', 'company'
  ];

  public function company()
  {
    return $this->belongsTo('App\Company', 'company');
  }
}
