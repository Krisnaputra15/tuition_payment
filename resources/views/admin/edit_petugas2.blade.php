@extends('template.admin')

@section('title')
Edit petugas page
@endsection

@section('konten')
<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Edit petugas {{$petugas->namapetugas}} info</h1>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->

<div id="content">
    <div class="container">
      <div class="bg-light shadow-md rounded p-4">
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
        <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Edit info</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
          <form method="post" action="{{url('admin/petugas/edit-process')}}">
            @csrf
            <label for="kelas">Name</label>
            <div class="form-group">
                <input type="text" name="id" value="{{$petugas->id}}" class="form-control" data-bv-field="number" id="signupEmail" required hidden placeholder="Class name">
              </div>  
              <div class="form-group">
                <input type="text" name="nama" value="{{$petugas->nama_petugas}}" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Class name">
              </div>
              <label for="kelas">Username</label>
              <div class="form-group">
                <input type="text" name="username" value="{{$petugas->username}}" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Class name">
              </div>
              <center><btn class="btn btn-primary btn-md" type="submit">Submit</btn></center>
            </form>
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