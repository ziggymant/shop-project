<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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
}
