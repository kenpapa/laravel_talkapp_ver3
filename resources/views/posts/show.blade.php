@extends('layouts.base')

@section('title')
投稿内容
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

    <div class="row">
      <div class="col-xs-6">
        <h2>投稿内容</h2>
      </div>
      <div class="col-xs-6">
        <a href="{{ route('posts.comments.create', $post->id) }}" class="btn btn-primary btn-space-20 pull-right">コメント</a>
      </div>
    </div>

    <div class="media well">
      <div class="media-left">
        <a href="#">
          <img class="media-object img-circle" src="{{ asset("images/".$post->user->image) }}" width=64 height=64>
        </a>
      </div>
      <div class="media-body">
        <h5 class="media-heading">{{ $post->user->name }}　<small>{{ $post->created_at }}</small></h5>
        <p>{{ $post->message }}</p>
        @if ($post->image !== "no image")
        <img src="{{ asset("images/".$post->image) }}" class="img-responsive">
        @endif

        <hr>

        @foreach ($post->comments as $comment)
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object img-circle" src="{{ asset("images/".$comment->user->image) }}" width=64 height=64>
            </a>
          </div>
          <div class="media-body">
            <h5 class="media-heading">{{ $comment->user->name }}　<small>{{ $comment->created_at }}</small></h5>
            <p>{{ $comment->message }}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </div>
</div>
@endsection
