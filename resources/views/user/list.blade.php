@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if(!empty($users))
      <div class="card">
        <div class="card-header">ユーザ一覧</div>

        @foreach ($users as $user)
        <!--Userテーブルのnameを一つずつ表示  -->
        <div class="card-body">
          {{ $user->name }}

          <div style="float:right">

            <?php
            // @if (count($user->follows) == 0)
            ?>

            @if(!in_array($user->id, $followId))
            <form method="POST" action="/users/follow/{{ $user->id }}" accept-charset="UTF-8" id="formTweet" enctype="multipart/form-data">
              <input id="followId" name="followId" type="hidden" value="{{ $user->id }}">

              <!-- actionでURL指定、個別でidを指定する場合はデータベースから引っ張る -->
              <button type="submit"  class="btn btn-light">フォローする
              </button>

              @else
                <form method="POST" action="/users/follow/{{ $user->id }}/delete" accept-charset="UTF-8" id="formTweet" enctype="multipart/form-data">
                <input id="followId" name="followId" type="hidden" value="{{ $user->id }}">

                <button type="submit" class="btn btn-light">フォロー中
                </button>
                @endif
                @csrf
              </form>



              <?php
              // {!! Form::open(['id' => 'formTweet', 'url' => 'users/follow/', 'enctype' => 'multipart/form-data']) !!}
              //     {{Form::hidden('followId', $user->id, ['id' => 'followId'])}}
              //     <button type="submit" class="btn btn-light">
              //         {{ __('フォローする') }}
              //     </button>
              // {!! Form::close() !!}
              ?>

              <?php

              ?>


            </div>
          </div>

          <hr>
          @endforeach

          <?php
          //{{ $users->links() }}
          ?>

        </div>
        @endif

      </div>
    </div>
  </div>
  @endsection
