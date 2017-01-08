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
    'file_id',
    'category_id'
  ];
    public function file() {
      return $this->hasOne('App\File');
    }

    public function hasFile($id){
      $file = File::findOrFail($id);
      return $file;
    }

    public function review(){
      return $this->hasMany('App\Review');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function score(){
        $reviews = Review::where('product_id', $this->id)->get();
        $score = 0;
        foreach ($reviews as $review ) {
          $score = $score + $review->rating;
        }
        if(count($reviews)){
          $score = $score / count($reviews);
          return $score;
        } else {
        return 0;
      }
    }
}
