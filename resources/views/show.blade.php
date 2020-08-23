@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <h1 class='pagetitle'>レビューページ</h1>
  <a href="{{ action('ReviewController@edit', $review) }}" class='btn btn-info btn-back mb20'>修正</a>
  <!-- @if ($review->user_id == Auth::user()->id) -->
    <a href="/postsdelete/{{ $review->id }}" class='btn btn-info btn-back mb20' rel="nofollow">削除</a>
  <!-- @endif -->
  <div class="card">
    <div class="card-body d-flex">
      <section class='review-main'>
        <p class='user_name'>投稿者: {{ $review->user->name }}</p>
        <!-- <h2 class='h2'>本のタイトル</h2> -->
        <p class='h2 mb20'>{{ $review->title }}</p>
        
        <!-- <h2 class='h2'>レビュー本文</h2> -->
        <p>{{ $review->body }}</p>
        <p class="description">{{ $review->updated_at }}</p>
      </section>  
      <!-- <aside class='review-image'> -->
@if(!empty($review->image))
        <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}">
@else
        <img class='book-image' src="{{ asset('images/dummy.png') }}">
@endif
      </aside>
    </div>
      
    <a href="{{ route('index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>

    </form>
  </div>
</div>

@endsection