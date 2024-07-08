
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>HostelConnect - Find your dream hostel</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  </head>
  <body >
  <header class="header" data-header>

<div class="overlay" data-overlay></div>



<div class="header-bottom">
  <div class="container">

    <a href="#" class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Homeverse logo">
    </a>

    <nav class="navbar" data-navbar>

      <div class="navbar-top">

        <a href="#" class="logo">
          <img src="{{ asset('images/logo.png') }}" alt="Homeverse logo">
        </a>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

      </div>

      <div class="navbar-bottom">
        <ul class="navbar-list">

          <li>
    <a class="navbar-link {{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}">Home</a>
          </li>

          <li>
            <a href="{{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}" class="navbar-link" data-nav-link>About</a>
          </li>

          <li>
            <a href="{{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}" class="navbar-link" data-nav-link>Service</a>
          </li>

          <li>
            <a href="{{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}" class="navbar-link" data-nav-link>Property</a>
          </li>

          <li>
      @if(!auth()->check())
            <a class="navbar-link {{(request()->route()->getName()=='getLogin')?'active':''}}" href="{{route('getLogin')}}">Login</a>
            @endif
          </li>

          <li>
       @if(!auth()->check())
            <a class="navbar-link {{(request()->route()->getName()=='getRegister')?'active':''}}" href="{{route('getRegister')}}">Sign up</a>
            @endif
          </li>

        </ul>
      </div>

    </nav>

    <div class="header-bottom-actions">

    @if(auth()->check())
    <a class="navbar-link {{(request()->route()->getName()=='dashboard')?'active':''}}" href="{{route('dashboard')}}">Profile</a>
    <a class="navbar-link" href="{{route('logout')}}">Logout</a>
    @endif

      <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>

        <span>Menu</span>
      </button>

    </div>

  </div>
</div>

</header>


<div class="container-fluid" style="min-height: 74vh;">
@yield('body')
</div>
<footer class="footer">

    
    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="#">Cindy & Rehema</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>

<script type="text/javascript">
  window.baseUrl="{{URL::to('/')}}";
  @if(session('success'))
  toastr.success('{{session("success")}}', 'Success', {timeOut: 5000});
  @endif

  @if(session('error'))
  toastr.error('{{session("error")}}', 'Error', {timeOut: 5000});
  @endif
</script>

<script type="text/javascript" src="{{asset('js/auth.js')}}"></script>
<script type="text/javascript" src="{{asset('js/profile.js')}}"></script>
</body>
</html>
