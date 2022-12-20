@extends('template.admin')

@section('title')
Edit tuition fee detail
@endsection

@section('konten')
<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Edit Student {{$siswa->nama}}'s {{$spp->bulan_tahun_spp}} tuition fee</h1>
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
          <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Edit tuition fee data</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
          <form method="post" action="{{url('admin/spp/edit-process')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="nisn" value="{{$spp->nisn}}" class="form-control" data-bv-field="number" id="signupEmail" required hidden placeholder="Class name">
              </div>
            <div class="form-group">
                <input type="text" name="id" value="{{$spp->id_pembayaran}}" class="form-control" data-bv-field="number" id="signupEmail" required hidden placeholder="Class name">
              </div>
              <label for="kelas">Month and Year</label>
              <div class="form-group">
                <input type="text" name="bulantahunspp" value="{{$spp->bulan_tahun_spp}}" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Class name">
              </div>
              <label for="kelas">Amount</label>
              <div class="form-group">
                <input type="number" name="amount" value="{{$spp->jumlah_bayar}}" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Class name">
              </div>
              <label for="kelas">Status</label>
              <div class="form-group">
                <input type="text" name="status" value="{{$spp->status}}" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Class name">
                <p style="color:grey;"><i>*fill the status with either not paid, waiting for verification, or verified</i></p>
              </div>
              <center><button class="btn btn-primary btn-md" type="submit">Submit change</button></center>
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