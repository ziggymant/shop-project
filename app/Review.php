<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'review', 'rating', 'product_id'];

    public function product(){
      return $this->belongsTo('App\Product');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public static function score($id){
        $reviews = Review::where('product_id', $id)->get();
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

    public function score2($id){
        $reviews = Review::where('product_id', $id)->get();
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
