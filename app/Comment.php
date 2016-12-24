<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'post_id',
      'email',
      'body',
      'is_active',
      'author'
    ];

    public function replies(){
      return $this->hasMany('App\CommentReply');
    }
}
