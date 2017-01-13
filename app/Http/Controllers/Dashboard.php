<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;
use App\User;
use App\Post;
use App\Order;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $chart =   Charts::create('pie', 'highcharts')
      ->title('Test chart')
      ->labels(['First', 'Second', 'Third'])
      ->values([5,10,20])
      ->dimensions(1000,500)
      ->responsive(true);

      $chart2 = Charts::database(User::all(), 'bar', 'highcharts')
      ->title('New users')
      ->elementLabel("Users")
      ->dimensions(1000, 500)
      ->responsive(true)
      ->lastByMonth(6, true);

      $chart3 = Charts::database(Post::all(), 'bar', 'highcharts')
      ->title('New posts')
      ->elementLabel("Posts")
      ->dimensions(1000, 500)
      ->responsive(true)
      ->lastByMonth(6, true);

      $chart4 = Charts::database(Order::all(), 'bar', 'highcharts')
      ->title('Product purchases')
      ->elementLabel("Purchases")
      ->dimensions(1000, 500)
      ->responsive(true)
      ->lastByMonth(6, true);

        return view('admin.index', compact('chart','chart2','chart3','chart4'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
