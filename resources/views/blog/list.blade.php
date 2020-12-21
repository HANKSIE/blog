@extends('templates.master')

@section('content')
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach ($Blogs as $Blog)
        <div class="post-preview">
          <a href="#">
            <h2 class="post-title">
              {{ $Blog->title }}
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on  {{ $Blog->created_at }}</p>
        </div>
      @endforeach
      
      <!-- Pager -->
      <div class="row justify-content-center">
        {{ $Blogs->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@endsection