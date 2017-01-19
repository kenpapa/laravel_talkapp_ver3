@extends('layouts.base')

@section('title')
ログイン
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>ログイン</h1>
    <form action="{{ route('login') }}" method="post">
      <div class="form-group">
        <label for="Email">Eメール</label>
        <input type="text" name="email" class="form-control" id="Email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="Password">パスワード</label>
        <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">ログイン</button>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
