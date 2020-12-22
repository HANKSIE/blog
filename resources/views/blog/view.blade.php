@extends('templates.master')

@section('content')
<link rel="stylesheet" href="{{ url('/vendor/ckeditor.css') }}">
<!-- Post Content -->
<article>
  <div class="container">
    <div class="row flex-column justify-content-center">
      <div class="row justify-content-center">
        <h1 class="mb-5">{{$Blog->title}}</h1>
      </div>
      <span class="row align-self-end">
        <blockquote class="blockquote">{{ $Blog->user->name }} on {{ $Blog->created_at }}</blockquote>
        @if (session('user')['id'] == $Blog->user->id)
          <div class="dropdown ml-4">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url("blog/{$Blog->id}/edit") }}">編輯</a> 
              <form action="{{ url("blog/{$Blog->id}/delete") }}">
                @method('delete')
                <input type="hidden" name="bid" value="{{ $Blog->id }}">
                <input class="dropdown-item" type="submit" value="刪除">
              </form> 
            </div>
          </div>
        @endif
      </span>
      
    </div>
  </div>
  <hr>
  <div class="col-lg-8 col-md-10 mx-auto ck ck-content ck-editor__editable_inline" style="word-wrap: break-word">
    {!! $Blog->content !!}
  </div>
</article>
@endsection
