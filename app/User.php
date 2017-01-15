<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_id', 'role_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function review(){
      return $this->hasMany('App\Review');
    }

    public function isAdmin(){
      if($this->role->name == "administrator" && $this->is_active == 1){
        return true;
      }
      return false;
    }

    public function mail_confirm($name, $email) {
      $data = ['name'=>$name, 'email'=>$email];
      Mail::send('emails.test', $data, function($message){

        $message->to($email, $name)->subject('Hello Ziggy');
      });
    }

    public function posts() {
      return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return 'http://www.gravatar.com/avatar/$hash';
    }

    public function cartItems(){
      if($cart = Cart::where('user_id', $this->id)->first()){
        return count($cart->cartItems);
      }

    }
}
