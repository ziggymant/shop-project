<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     $categories1 = App\Category::take(4)->get();
//     $categories2 = App\Category::skip(4)->take(4)->get();
//     $posts = App\Post::orderBy('created_at','desc')->paginate(5);
//     return view('welcome', compact('posts', 'categories1', 'categories2'));
// });

Auth::routes();

Route::get('/{id?}','ProductPublicController@index');
Route::get('/home', 'ProductPublicController@home');
Route::get('/item/{id}','ProductPublicController@item');
Route::get('/blog/posts', 'PublicBlogController@index');
Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'PublicBlogController@post']);
Route::get('/category/{id}', 'ProductPublicController@category');
// Route::get('/user/activate', 'Controller@mail');

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');



Route::get('/search/{q}', 'Controller@search');
Route::get('/productsearch/{q}', 'ProductPublicController@search');


Route::group(['middleware'=>'admin'], function(){


  Route::get('/admin/index', ['as'=>'admin.index','uses'=>'Dashboard@index']);
  Route::resource('/admin/users', 'AdminUsersController');
  Route::resource('/admin/posts', 'AdminPostsController');
  Route::resource('/admin/categories' ,'AdminCategoriesController');
  Route::resource('/admin/media', 'AdminMediaConrtoller');
  Route::resource('/admin/comments', 'PostCommentsController');
  Route::resource('/admin/comment/replies', 'CommentRepliesController');

  Route::get('/admin/shop/new', 'ProductController@newProduct');
  Route::get('/admin/shop/products', 'ProductController@index');
  Route::get('/admin/shop/product/destroy/{id}', 'ProductController@destroy');
  Route::post('/admin/shop/product/save', 'ProductController@add');

});

Route::group(['middleware'=>'auth'], function(){

  Route::post('/comment/reply', 'CommentRepliesController@createReply');

  Route::get('/shop','ProductPublicController@home');
  Route::post('/review','ProductPublicController@StoreReview');
  Route::get('/shop/cart', 'CartController@showCart');
  Route::get('/shop/addProduct/{productId}', 'CartController@addItem');
  Route::get('/shop/edit/{productId}', 'ProductController@edit');
  Route::patch('/shop/update/{productId}', 'ProductController@update');
  Route::get('/shop/removeItem/{productId}', 'CartController@removeItem');

  Route::post('/checkout', 'OrderController@checkout');
  Route::get('order/{orderId}', 'OrderController@viewOrder');
  Route::get('order', 'OrderController@index');
  Route::get('download/{orderId}/{filename}', 'OrderController@download');
  Route::get('shop/orders','OrderController@allOrders' );

});
