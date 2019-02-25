<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

  public function index() {

    //配列で帰ってきたので、変数をlistで指定。
    list($user_data, $followId) = User::getUser();
    return view('user.list', ['users' => $user_data, 'followId' => $followId]);
  }

  public function follow($follow_id) {
    $follow = new Follow; //followsテーブル指定してインスタンスを作成
    $follow->user_id = Auth::id(); //ログイン中のidを取得
    $follow->follow_id = $follow_id; //フォロー先のidを取得
    $follow->save(); //保存

    return redirect()->route('user_list');
  }

  public function destroy($follow_id) {
    Follow::where('follow_id',$follow_id)->delete();
    return redirect()->route('user_list');
  }
}
