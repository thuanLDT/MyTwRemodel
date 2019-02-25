<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUser() {

    //自分以外のデータを取得する。
    $user_data = User::where('id', '!=', Auth::id())->get();

    //フォロー判定。
    $findFollow = Follow::where('user_id', Auth::id())->get();
    $followId = [];
    foreach($findFollow as $follow) {
      $followId[] = $follow->follow_id;
    }
    //どうやらPHPは一つしか返さないらしいので配列で纏めて行くしかないらしい。
    return array($user_data, $followId);
  }
}
