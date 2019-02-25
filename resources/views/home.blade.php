@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if( Auth::user()->name != null )
        <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>
        @endif

        @foreach ($tweets as $tweet)

        <div class="card-body">
          {{ $tweet->tweet }}
          <br>
          <div style="display:flex; justify-content: left;align-items: center;">
            <div style="float:left">
              {{ $tweet->getData() }} / {{ $tweet->created_at }}
            </div>
            <div style="float:left" class="heart"></div>

            @if($tweet->user_id == Auth::id())
            <form action="/tweet/delete" method="post">
              <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
              <button type="submit" style="float:left" class="delete"></button>
              @csrf
            </form>
            @endif

          </div>
        </div>





        <hr style="margin-top:0px; margin-bottom:0px">

        @endforeach

        <!-- <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif

      You are logged in!
    </div> -->
  </div>

  <?php
  // {{ $tweets->links() }}
  ?>
</div>
</div>
</div>
@endsection
