@extends('template.petugas')

@section('judul')
{{$kelas->nama_kelas}} student(s)
@endsection

@section('konten')
<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Student list</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">Student list</li>
            </ul>
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
          <li class="nav-item"> <a class="nav-link active" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">{{$kelas->nama_kelas}} student(s)</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade show active" id="second" role="tabpanel" aria-labelledby="second-tab">
          <div class="table-responsive-md">
          @if($siswacount == 0)
            <center>
            <h5><i>Oops, no student has been added in {{$kelas->nama_kelas}} yet</i></h5>
            <br>
              @else
            <table class="table table-hover border">
              <thead class="thead-light">
                <tr>
                  <th>NISN</th>
                  <th>NIS</th>
                  <th>Name</th>
                  <th class="text-center">Class</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              @if($siswacount > 1)
              @foreach($siswa as $s)
                <tr>
                  <td class="align-middle">{{$s->nisn}}</td>
                  <td class="align-middle">{{$s->nis}}</td>
                  <td class="align-middle">{{$s->nama}}</td>
                  <td class="align-middle text-center">{{$s->nama_kelas}}</td>
                  <td class="align-middle text-center">
                        <a class="btn btn-success btn-sm" href="{{url('petugas/student-'.$s->nisn.'/detail')}}">detail</a>
                  </td>
                        
                </tr>
              @endforeach
              @else
                <tr>
                  <td class="align-middle">{{$siswa->nisn}}</td>
                  <td class="align-middle">{{$siswa->nis}}</td>
                  <td class="align-middle">{{$siswa->nama}}</td>
                  <td class="align-middle text-center">{{$siswa->nama_kelas}}</td>
                  <td class="align-middle text-center">
                        <a class="btn btn-success btn-sm" href="{{url('petugas/student-'.$siswa->nisn.'/detail')}}">detail</a>
                  </td>
                </tr>
              @endif
              </tbody>
            </table>
            @endif  
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