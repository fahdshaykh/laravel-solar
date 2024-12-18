<!DOCTYPE html>
<html lang="en" class="loading">
<!-- BEGIN : Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="">
  <meta name="keywords"
    content="">
  <meta name="author" content="Divine Speaker">
  <title>Login Page - Divine Speaker</title>
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('app-assets/img/ico/apple-icon-60.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('app-assets/img/ico/apple-icon-76.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('app-assets/img/ico/apple-icon-120.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('app-assets/img/ico/apple-icon-152.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/img/ico/favicon.ico')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('app-assets/img/ico/favicon-32.png')}}">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
    rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/feather/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/izitoast/css/iziToast.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/prism.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN APEX CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
  @stack('styles')
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body data-col="1-column" class=" 1-column  blank-page">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="wrapper">
    <div class="main-panel">
      <!-- BEGIN : Main Content-->
      <div class="main-content">
            @yield('content')

      </div>
      <!-- END : End Main Content-->
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('app-assets/vendors/js/core/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/prism.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/screenfull.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/vendors/js/pace/pace.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN APEX JS-->
  <script src="{{asset('app-assets/js/app-sidebar.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/js/notification-sidebar.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/izitoast/js/iziToast.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/js/customizer.js')}}" type="text/javascript"></script>
 @stack('scripts')

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<script>
    iziToast.error({
        title: 'Error!',
        message: '{{ $error }}',
        position: 'topRight'
    });
</script>
@endforeach
@endif
</body>
<!-- END : Body-->

</html>