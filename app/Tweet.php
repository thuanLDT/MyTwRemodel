<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Tweet extends Model {

  public static function getTweet() {
    //followsテーブルから自分をフォローしているユーザーのidを見つける。
    $findFollow = Follow::where('user_id', Auth::id())->get();

    //タイムラインに乗せるためのidを配列にまとめる
    $timeLineData = [Auth::id()];
    foreach($findFollow as $follow) {
      $timeLineData[] = $follow->follow_id;
    }
    //tweetsテーブルから$timeLineDataの配列に合致するidを探す。
    $user_data = Tweet::whereIn('user_id',$timeLineData)->latest()->get();

    //モデルなのでコントローラーに渡す結果(変数)を忘れずに!
    return $user_data;
  }

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function getData() {
    return $this->user->name;
  }
}
