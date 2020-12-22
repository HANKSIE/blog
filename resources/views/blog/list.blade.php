@extends('templates.master')

@section('content')
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @forelse ($Blogs as $Blog)
        <div class="post-preview">
          <a href="#">
            <h2 class="post-title">
              <a href="{{url("/blog/{$Blog->id}")}}">
                {{ $Blog->title }}
              </a>
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $Blog->user->name }}</a>
            on  {{ $Blog->created_at }}</p>
        </div>
      @empty
          <h1 class="text-center">沒有文章</h1>
      @endforelse

      <!-- Pager -->
      <div class="row justify-content-center">
        {{ $Blogs->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@endsection