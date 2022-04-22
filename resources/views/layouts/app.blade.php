<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Real-Time Voting | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{  asset ('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{  asset ('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ URL::to("/") }}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
      
      
      
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif
      
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
      
      
      
        @else
        <div class="" >
                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 <button type="submit" class="btn btn-primary">
                  {{ __('Logout') }}
              </button>

                </a>
              
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
           <b> {{ Auth::user()->name }} </b>
          </a>
      
   
        </li>
        @endguest
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{ URL::to("/") }}"  class="brand-link">
      
      <span class="brand-text font-weight-light">Real-Time Voting</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      < <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/admin1.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>Voter</b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
               @if(Auth::check())
               @if(Auth::user()->Role == 'admin')
               <li class="nav-item menu-open">
                 <a href="{{ URL::to("/admin") }}"  class="nav-link active">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
                 
               </li>
            
          
        <li class="header">MANAGE</li>
        <li class="nav-item">
          <a href="{{ URL::to("voterslist") }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Voters
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ URL::to("candidatelist") }}" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
             Candidates
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ URL::to("positions") }}" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Positions
            </p>
          </a>
        </li>
        
        <li class="nav-header">CREATE</li>
       
          <li class="nav-item">
                <a href="{{URL::to('/elections')}}" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Elections Settings
                  </p>
                </a>
          </li>
          <li class="nav-item">
              <a href="{{ URL::to("poll") }}" class="nav-link">
                <i class="nav-icon fas fa-poll h"></i>
                <p>
                  Polls
                </p>
              </a>
            </li>
          @endif
          @endif
                <li class="nav-item">
                  <a href="{{ URL::to("ViewPolls") }}" class="nav-link">
                    <i class="nav-icon fas fa-poll h"></i>
                    <p>
                      Poll Voting
                    </p>
                  </a>
                </li>
        
       

          <li class="nav-item">
            <a href="{{URL::to('/vote')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Elections 
              </p>
            </a>
          </li>

          <li class="header">REPORTS</li>
          
          <li class="nav-item">
              <a href="{{URL::to('/voteTally/1')}}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Election Results
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to("selectPollresult") }}" class="nav-link">
                  <i class="nav-icon fas fa-poll h"></i>
                  <p>
                    Poll Results
                  </p>
                </a>
              </li>
      
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Kwamboka</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <p>All rights reserved.</p> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
