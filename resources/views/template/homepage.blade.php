<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Quickai - downloaded from themelock.com - Recharge & Bill Payment, Booking HTML5 Template</title>
<meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/font-awesome/css/fontawesome.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/owl.carousel/assets/owl.carousel.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/owl.carousel/assets/owl.theme.default.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/daterangepicker/daterangepicker.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('css/stylesheet.css') !!}" />
</head>

<body>
 <!-- Header
  ============================================= -->
  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"> 
          
          <!-- Logo
          ============================================= -->
          <div class="logo"> <a href="{{url('/')}}" title="Quickai - HTML Template"><img src="{!! asset('images/logo.png') !!}" alt="Quickai" width="127" height="29" /></a> </div>
          <!-- Logo end --> 
          
        </div>
        <div class="header-column justify-content-end"> 
          
          
        </div>
        
        <!-- Collapse Button
        ============================================= -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
      </div>
    </div>
  </header>
  <!-- Header end --> 
@yield('konten')
@yield('js')
</body>
</html>