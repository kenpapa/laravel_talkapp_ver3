@extends('layouts.base')

@section('title')
登録
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>登録</h1>
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Name">名前</label>
        <input type="text" name="name" class="form-control" id="Name" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="Email">Eメール</label>
        <input type="text" name="email" class="form-control" id="Email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="Password">パスワード</label>
        <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="ImageFile">プロフィール画像ファイル</label>
        <input type="file" name="file" id="ImageFile">
      </div>
      <button type="submit" class="btn btn-primary">登録</button>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
