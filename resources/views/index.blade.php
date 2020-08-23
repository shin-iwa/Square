@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row justify-content-center">

@foreach($reviews as $review)
    <div class="col-md-4">
        <div class="card mb50">
            <div class="card-body">
            <p class='user_name'>投稿者: {{ $review->user->name }}</p>
            @if(!empty($review->image))
              <div class='image-wrapper'><img class='book-image' src="/storage/post_images/{{ $review->id }}.jpg"></div>
            @else
                <div class='image-wrapper'><img class='book-image' src="{{ asset('images/noimage.png') }}"></div>
            @endif
                <h3 class='h3 book-title'>{{ $review->title }}</h3>
                <p class='description'>
                    {{ $review->body }}
                </p>
                <p class='description'>
                    <{{ $review->created_at }}>
                </p>
                <a href="{{  action('ReviewController@show', $review) }}" class='btn btn-secondary detail-btn'>詳細を読む</a>
            </div>
        </div>
    </div>
@endforeach
</div>
{{ $reviews->links() }}
@endsection