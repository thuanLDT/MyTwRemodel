<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller {
  public function update(Request $req) {

    $user_tweet = new Tweet; //tweetsテーブルを指定してインスタンスを生成。
    $user_tweet->tweet = $req->tweet; //記述されたツイートを要求する。
    $user_tweet->user_id = auth::id();//どこのデータベースに何をあてがうか。
    $user_tweet->save();
    return redirect("/home");
  }

  public function tweetdelete(Request $req) {

    Tweet::where('user_id',Auth::id())->where('id',$req->tweet_id)->delete();
    return redirect('/home');
  }
  
}
