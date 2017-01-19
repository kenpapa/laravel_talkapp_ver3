@extends('layouts.base')

@section('title')
グループ交流アプリ
@endsection

@section('content')
<div class="jumbotron">
  <h1>グループ交流アプリ</h1>
  <p>本アプリケーションは○○グループのメンバー間で情報共有を行うためのWebアプリケーションです。未登録の方は下記のボタンを押して登録をお願いします。</p>
  <a class="btn btn-primary" href="{{ route('users.create') }}">登録画面へ</a>
</div>
@endsection
