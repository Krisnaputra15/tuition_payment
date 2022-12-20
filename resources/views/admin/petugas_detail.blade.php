@extends('template.admin')

@section('judul')
Petugas profile page
@endsection

@section('konten')
<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1>Petugas {{$petugas->nama_petugas}}'s page</h1>
        </div>
        <div class="col-md-4">
          <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
            <li><a href="">Home</a></li>
            <li class="active">Student's profile</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Header end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="container">
      <div class="bg-light shadow-md rounded p-4">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">Personal Information</a> </li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content my-3" id="myTabContentVertical">
              <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                  <div class="col-lg-8">
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
                    <h4 class="mb-4">Personal Information</h4>
                    <form id="signupForm" method="post">
            @csrf
            <label for="nisn">Name</label>
              <div class="form-group">
                <input type="text" name="nisn" value="{{$petugas->nama_petugas}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's NISN">
              </div>
              <label for="nis">Username</label>
              <div class="form-group">
                <input type="text" name="nis" value="{{$petugas->username}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's NIS">
              </div>
              <label for="nama">Level</label>
              <div class="form-group">
                <input type="text" name="nama" value="{{$petugas->level}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's Name">
              </div>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
@endsection

@section('js')
<script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> 
<script src="{!! asset('vendor/owl.carousel/owl.carousel.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap-spinner/bootstrap-spinner.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script> 
<script src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script> 
<script>
$(function() {
 'use strict';
  // Birth Date
  $('#birthDate').daterangepicker({
	singleDatePicker: true,
	autoApply: true,
	showDropdowns: true,
	autoUpdateInput: false,
	maxDate: moment().add(0, 'days'),
	}, function(chosen_date) {
  $('#birthDate').val(chosen_date.format('MM-DD-YYYY'));
  });
  });
</script> 
<script src="js/theme.js"></script>
@endsection
