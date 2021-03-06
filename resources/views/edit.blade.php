@extends('layouts.app')

@section('content')
<h2 class="review-title">修正ページ</h1>
  @if($errors->any())
    <div class='alert alert-danger'>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
<div class="row justify-content-center container">
    <div class="col-md-10">
      <form method='POST' action="{{ url($review->id )}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>本のタイトル</label>
                <input type='text' class='form-control' name='title' value="{{ old('title', $review->title) }}">
              </div>
              <div class="form-group">
              <label>レビュー本文</label>
                <textarea class='description form-control' name='body'>{{ old('body', $review->body) }}</textarea>
              </div>
              <div class="form-group">
                <label for="file1">本のサムネイル</label>
                <input type="file" id="file1" name='image' class="form-control-file" value="{{ old('image', $review->image) }}">
              </div>
              <input type='submit' class='btn btn-primary' value='修正'>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection