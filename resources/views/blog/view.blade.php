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
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ url("blog/{$Blog->id}/edit") }}">編輯</a> 
             
              @if ($Blog->trashed())
                <form method="POST" action="{{ url("blog/ashcan/{$Blog->id}/restore") }}">
                  {{ csrf_field() }}
                    @method('PUT')
                    <input type="hidden" name="bid" value="{{ $Blog->id }}">
                    <input class="dropdown-item" type="submit" value="復原">
                </form>  
                <form method="POST" action="{{ url("blog/ashcan/{$Blog->id}/remove") }}">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <input type="hidden" name="bid" value="{{ $Blog->id }}">
                  <input class="dropdown-item" type="submit" value="永久移除">
                </form>
              @else
                <form method="POST" action="{{ url("blog/{$Blog->id}/throw") }}">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <input type="hidden" name="bid" value="{{ $Blog->id }}">
                  <input class="dropdown-item" type="submit" value="放入垃圾桶">
                </form> 
              @endif
            </div>
          </div>
        @endif
        <div class="ml-5">
          @if($Blog->zan(session('user')['id'])->exists())
              <a href={{url("blog/{$Blog->id}/unzan")}} type="button" class="fas fa-thumbs-up"></a>
          @else
              <a href={{url("blog/{$Blog->id}/zan")}} type="button" class="far fa-thumbs-up"></a>
          @endif
          有<strong class="text-primary">{{$likes}}</strong>人按讚
        </div>
      </span>
    </div>
  </div>
  <hr>
  <div class="col-lg-8 col-md-10 mx-auto ck ck-content ck-editor__editable_inline" style="word-wrap: break-word">
    {!! $Blog->content !!}
  </div>
</article>
@endsection
