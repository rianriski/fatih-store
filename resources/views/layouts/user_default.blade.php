<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ShaynaAdmin - HTML5 Admin Template</title>
  <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- ini untuk csrf laravel --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Style -->
  @stack('before-style')
  @include('includes.style')
  @stack('after-style')
  <!-- End Style -->
</head>

<body>

  <!-- Sidebar -->
  @include('includes.user_sidebar')
  <!-- End Sidebar -->

  <div id="right-panel" class="right-panel">

    <!-- Navbar -->
    @include('includes.navbar')
    <!-- End Navbar -->

    <!-- Content -->
    <div class="content">

      @include('layouts.alert')

      <!-- dashboard page -->
      @yield('content')
      <!-- end dashboard page -->

    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

  <!-- Scripts -->
  @stack('before-script')
  @include('includes.script')
  @stack('after-script')
  <!-- End Script -->
</body>

</html>