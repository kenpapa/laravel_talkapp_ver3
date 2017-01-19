@extends('layouts.base')

@section('title')
登録情報修正
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>登録情報修正</h1>
    <p><strong>修正する箇所のみ入力してください</strong></p>
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
      <input name="_method" type="hidden" value="PUT">
      <div class="form-group">
        <label for="Name">名前</label>
        <input type="text" name="name" class="form-control" id="Name">
      </div>
      <div class="form-group">
        <label for="Email">Eメール</label>
        <input type="text" name="email" class="form-control" id="Email">
      </div>
      <div class="form-group">
        <label for="Password">パスワード</label>
        <input type="password" name="password" class="form-control" id="Password">
      </div>
      <div class="form-group">
        <label for="ImageFile">新しいプロフィール画像ファイル</label>
        <input type="file" name="file" id="ImageFile">
      </div>
      <button type="submit" class="btn btn-primary">修正</button>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
