@extends('templates.master')

<link rel="stylesheet" href="{{ url('/vendor/ckeditor.css') }}">

@section('content')
<!-- Post Content -->
<article>
  <div class="row flex-column col-lg-8 col-md-10 mx-auto">
    <div class="row flex-column justify-content-center align-items-center">
      <h1 class="mb-5">{{$Blog->title}}</h1>
      @if (session('user')['id'] == $Blog->user->id)
        <a href="{{ url("blog/{$Blog->id}/edit") }}">編輯</a>  
      @endif
      <blockquote class="blockquote align-self-end">{{ $Blog->user->name }} on {{ $Blog->created_at }}</blockquote>
    </div>
  </div>
  <hr>
  <div class="col-lg-8 col-md-10 mx-auto ck ck-content ck-editor__editable_inline"  style="min-height: 50vh">
    {!! $Blog->content !!}
  </div>
</article>

@endsection