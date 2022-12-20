@extends('template.homepage')
@section('konten')
 <!-- Content
  ============================================= -->
  <div id="content">
    
    <!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Login & Signup</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">Login/Signup</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->
    
    <div class="container">
      <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a id="login-page-tab" class="nav-link active text-4" data-toggle="tab" href="#loginPage" role="tab" aria-controls="login" aria-selected="true">Login</a> </li>
          <li class="nav-item"> <a id="signup-page-tab" class="nav-link text-4" data-toggle="tab" href="#signupPage" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a> </li>
        </ul>
        <div class="tab-content pt-4">
        @if(Session::has('alert_success'))
            <div class="alert alert-success">
            <center>{{Session('alert_success')}}<center>
            </div>
        @endif
        @if(Session::has('alert_warning'))
            <div class="alert alert-danger">
                <center>{{Session('alert_warning')}}<center>
            </div>
        @endif
          <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
            <form id="loginForm" method="post" action="{{url('/log/process')}}">
            @csrf
              <div class="form-group">
                <input type="text" name="username" class="form-control" id="loginMobile" required placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" id="loginPassword" required placeholder="Password">
              </div>
              <div class="row mb-4">
                <div class="col-sm">
                  <div class="form-check custom-control custom-checkbox">
                    <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="col-sm text-right"> <a class="justify-content-end" href="#">Forgot Password ?</a> </div>
              </div>
              <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
          </div>
          <div class="tab-pane fade" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab">
            <form id="signupForm" method="post" action="{{url('/reg/process')}}">
            @csrf
              <div class="form-group">
                <input type="text" name="nama" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Nama">
              </div>
              <div class="form-group">
                <input type="text" name="username" class="form-control" id="signupMobile" required placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" id="signuploginPassword" required placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" name="auth_code" class="form-control" id="signupMobile" required placeholder="Authentication code">
              </div>
              <button class="btn btn-primary btn-block" type="submit">Signup</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
@endsection
@section('js')
<!-- Script -->
<script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> 
<script src="{!! asset('vendor/owl.carousel/owl.carousel.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap-spinner/bootstrap-spinner.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script> 
@endsection