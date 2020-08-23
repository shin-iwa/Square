@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <!-- <h1 class='pagetitle'>レビュー詳細</h1> -->
    @if ($review->user->id == Auth::user()->id)
      <a href="{{ action('ReviewController@edit', $review) }}" class='btn btn-info btn-back mb20'>修正</a>
      <a href="/postsdelete/{{ $review->id }}" class='btn btn-info btn-back mb20' rel="nofollow">削除</a>
    @endif
  <div class="card">
    <div class="card-body d-flex">
      <section class='review-main'>
        <p class='user_name'>投稿者: {{ $review->user->name }}</p>
        <!-- <h2 class='h2'>本のタイトル</h2> -->
        <p class='h2 mb20'>{{ $review->title }}</p>
        
        <!-- <h2 class='h2'>レビュー本文</h2> -->
        <p>{!! nl2br(e($review->body)) !!}</p>
        <p class="description">作成<{{ $review->created_at }}></p>
      </section>  

      </aside>
    </div>
    <div class="image-box">
      @if(!empty($review->image))
          <img class='book-image' src="/storage/post_images/{{ $review->id }}.jpg">
      @else
          <!-- <img class='book-image' src="{{ asset('images/noimage.png') }}"> -->
      @endif
    </div>
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>

    </form>
  </div>
</div>

@endsection