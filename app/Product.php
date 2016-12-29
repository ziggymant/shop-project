<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [
    'name',
    'description',
    'price',
    'imageurl',
    'file_id'
  ];
    public function file() {
      return $this->hasOne('App\File');
    }
}
