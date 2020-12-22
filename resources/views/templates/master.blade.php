<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{url('css/clean-blog.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">列表</a>
          </li>
          @if (session()->has('user'))
            <li class="nav-item dropdown" style="cursor: pointer">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown">文章</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/blog/manage')}}">管理我的文章</a>
                <a class="dropdown-item" href="{{url('/blog/create')}}">新增</a>
                <a class="dropdown-item" href="{{url('/blog/ashcan')}}">垃圾桶</a>
              </div>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{ session('user')['name'] }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/sign-out')}}">登出</a>
          </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{url('/sign-in')}}">登入</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/sign-up')}}">註冊</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{url('img/home-bg.jpg')}})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              @isset($heading)
                <h1>{{ $heading }}</h1>
              @endisset
              @isset($subheading)
                <span class="subheading">{{ $subheading }}</span>
              @endisset 
            </div>
          </div>
        </div>
      </div>
    </header>

  <!-- Main Content -->
  @yield('content')

  <hr>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{url('js/clean-blog.js')}}"></script>

</body>

</html>
