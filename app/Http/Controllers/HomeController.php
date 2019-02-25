<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() {

    $timeLine = Tweet::getTweet();
    return view('home', ['tweets' => $timeLine]);
  }
}
