@extends('layouts.base')

@section('title')
投稿一覧
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

    <div class="row">
      <div class="col-xs-6">
        <h2>投稿一覧</h2>
      </div>
      <div class="col-xs-6">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-space-20 pull-right">新しい投稿</a>
      </div>
    </div>

    @foreach($posts as $post)
    <div class="row well">
      <div class="col-xs-9">
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object img-circle" src="{{ asset("images/".$post->user->image) }}" width=64 height=64>
            </a>
          </div>
          <div class="media-body">
            <h5 class="media-heading">{{ $post->user->name }}　<small>{{ $post->created_at }}</small></h5>
            <p>{{ $post->message }}</p>
          </div>
        </div>
      </div>
      <div class="col-xs-3">
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-xs pull-right">表示</a>

        @if ($post->user->id === Auth::user()->id)
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
          <input name="_method" type="hidden" value="DELETE">
          <button type="submit" class="btn btn-danger btn-xs pull-right">削除</button>
          {{ csrf_field() }}
        </form>
        @endif

      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection

@section('script')
$(document).ready(function(){
  $(".btn-danger").click(function(e){
    if(!confirm("本当に削除しますか？")){
      e.preventDefault();
      return false;
    }
    return true;
  });
});
@endsection
