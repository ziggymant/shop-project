<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search($q) {
      $posts = Post::where("title", "like", $q."%")->pluck("title", "slug");
      // dd($posts);
      if ($posts) {
        return $posts;
      } else {
        exit();
      }
      exit();
    }

    public function mail() {
      $data = [
        'title'=>'Message title',
        'content'=>'My first mail using mailgun'
      ];

        Mail::send('emails.test', $data, function($message){

        $message->to('zmzygis@gmail.com', 'Zygimantas')->subject('Hello Ziggy');
      });
    }
}
