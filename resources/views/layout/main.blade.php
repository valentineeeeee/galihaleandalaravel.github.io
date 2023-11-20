@php
  $user = auth()->user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <title>Atlas Coffee & Bike</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"
      style="position: sticky; top:0; height:auto; min-height:auto;  ">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/" role="button"><i class="fas fa-home"></i>Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" href="{{ url('#') }}" role="button">
            <i class="nav-icon fas fa-bell"></i>Notification
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('logout') }}" role="button">
            <i class="nav-icon fas fa-sign-out-alt"></i>Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4"
      style="height: 100vh; min-height: 100vh; position:fixed; top:0;">
      <!-- Brand Logo -->
      {{-- <a href="{{ asset('/') }}index3.html" class="brand-link">
      <img src="{{ asset('/') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
          <div class="image">
            @if ($user->image != '')
              <img src="{{ asset('storage/photo/' . $user->image) }}" class="img-circle elevation-2"
                style="aspect-ratio: 1/1; width:100px; object-fit: cover;" alt="User Image">
            @else
              <img src="{{ asset('images/Hitori (1).jpg') }}" class="img-circle elevation-2"
                style="aspect-ratio: 1/1; width:100px; object-fit: cover;" alt="User Image">
            @endif
          </div>

          <div class="info">
            <a href="#" class="d-block"
              style="text-transform:uppercase; font-weight:bold; white-space: normal; text-align: center">{{ $user->username }}
              ({{ $user->name }})</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @include('layout.menu')
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="col-12 d-flex justify-content-between col-xl py-3">
          <h1>@yield('judul')</h1>
          </a>
          <i style="font-weight:bold; font-style:normal;">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</i>
        </div>
        {{-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('judul')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> --}}
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        @yield('isi')
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>

</html>
