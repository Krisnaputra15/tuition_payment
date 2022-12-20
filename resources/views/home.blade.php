@extends('template.homepage')
@section('konten')
<!-- Preloader -->
<div id="preloader"><div data-loader="dual-ring"></div></div><!-- Preloader End -->

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  
 
  
  <!-- Content
  ============================================= -->
  <div id="content">
  @if(Session::has('alert_success'))
            <div class="alert alert-success">
            <center>{{Session()->get('alert_success')}}<center>
            </div>
        @endif
        @if(Session::has('alert_warning'))
            <div class="alert alert-danger">
                <center>{{Session()->get('alert_warning')}}<center>
            </div>
        @endif
    <div class="hero-wrap py-4 py-md-5">
      <div class="hero-mask opacity-7 bg-primary"></div>
      <div class="hero-bg" style="background-image:url('./images/bg/image-2.jpg');"></div>
      <div class="hero-content py-0 py-lg-3">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="position-relative px-4 pt-3 pb-4">
                <div class="hero-mask opacity-8 bg-dark rounded"></div>
                <div class="hero-content">
                  <!-- Tabs -->
                  <ul class="nav nav-tabs nav-fill style-4 border-bottom" id="myTab" role="tablist">
                    <li class="nav-item"> <a class="nav-link  active" id="trains-tab" data-toggle="tab" href="#trains" role="tab" aria-controls="trains" aria-selected="false">Login</a> </li>
                  </ul>
                  <div class="tab-content pt-4" id="myTabContent">
                    <!-- Search Train -->
                    <div class="tab-pane fade show active" id="trains" role="tabpanel" aria-labelledby="trains-tab">
                      <form id="bookingTrain" method="post" action="{{url('siswa-login')}}">
                      @csrf
                        <div class="row">
                          <div class="col-12 form-group">
                            <input type="text" name="nisn" class="form-control" id="trainFrom" required placeholder="NISN">
                            <span class="icon-inside"><i class="fa fa-user"></i></span> </div>
                          <div class="col-12 form-group">
                            <input type="password" name="password" class="form-control" id="trainTo" required placeholder="Password">
                            <span class="icon-inside"><i class="fa fa-key"></i></span> </div>
                        </div>
                        <button class="btn btn-primary btn-block mt-2" type="submit">Login</button>
                      </form>
                    </div>
                   
                  </div><!-- Tabs End -->
                </div>
              </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
              <h2 class="text-9 font-weight-600 text-light">Why Booking with Quickai ?</h2>
              <p class="lead mb-4 text-light">Online Booking. Save Time and Money!</p>
              <div class="row">
                <div class="col-12">
                  <div class="featured-box style-3 mb-4">
                    <div class="featured-box-icon border rounded-circle text-light"> <i class="fas fa-dollar-sign"></i></div>
                    <h3 class="text-light">Cheapest Price</h3>
                    <p class="text-light opacity-8">Always get cheapest price with the best in the industry. So you get the best deal every time.</p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="featured-box style-3 mb-4">
                    <div class="featured-box-icon border rounded-circle text-light"> <i class="fas fa-times"></i></div>
                    <h3 class="text-light">Easy Cancellation & Refunds</h3>
                    <p class="text-light opacity-8">Get instant refund and get any booking fees waived off! Easy cancellation process is available.</p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="featured-box style-3 mb-4">
                    <div class="featured-box-icon border rounded-circle text-light"> <i class="fas fa-percentage"></i></div>
                    <h3 class="text-light">No Booking Charges</h3>
                    <p class="text-light opacity-8">No hidden charges, no payment fees, and free customer service. So you get the best deal every time!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
  <!-- Content end -->   
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 


<!-- Modal Dialog - Login/Signup end --> 
@endsection

@section('js')
<!-- Script --> 
<script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> 
<script src="{!! asset('vendor/owl.carousel/owl.carousel.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap-spinner/bootstrap-spinner.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script> 
<script>
$(function() {
 'use strict';
 
  // Hotels Check In Date
  $('#hotelsCheckIn').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#hotelsCheckIn').val(chosen_date.format('MM-DD-YYYY'));
  });
  
  // Hotels Check Out Date
  $('#hotelsCheckOut').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#hotelsCheckOut').val(chosen_date.format('MM-DD-YYYY'));
  });
  
  // Flight Depart Date
  $('#flightDepart').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#flightDepart').val(chosen_date.format('MM-DD-YYYY'));
  });
  
  // Flight Return Date
  $('#flightReturn').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#flightReturn').val(chosen_date.format('MM-DD-YYYY'));
  });
  
  // Train Depart Date
  $('#trainDepart').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#trainDepart').val(chosen_date.format('MM-DD-YYYY'));
  });
  
  // Bus Depart Date
  $('#busDepart').daterangepicker({
	singleDatePicker: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#busDepart').val(chosen_date.format('MM-DD-YYYY'));
  });
});
</script> 
<script src="js/theme.js"></script>
@endsection