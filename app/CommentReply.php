<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
  protected $fillable = [
    'comment_id',
    'email',
    'body',
    'is_active',
    'author'
  ];

  public function comment(){
    return $this->belongsTo('App\Comment');
  }

  public function authorPhoto($name){
    $user = User::where('name', $name)->get()->first();
    $path = $user->photo->path;
    return $path;
  }
}
