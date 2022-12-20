@extends('template.admin')

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
                  <td class="align-middle text-center"><a class="btn btn-warning btn-sm" href="{{url('admin/student-'.$s->nisn.'/edit')}}">edit</a>
                        <a class="btn btn-danger btn-sm" href="{{url('admin/student-'.$s->nisn.'/delete')}}">delete</a>
                        <a class="btn btn-success btn-sm" href="{{url('admin/student-'.$s->nisn.'/detail')}}">detail</a>
                  </td>
                        
                </tr>
              @endforeach
              @else
                <tr>
                  <td class="align-middle">{{$siswa->nisn}}</td>
                  <td class="align-middle">{{$siswa->nis}}</td>
                  <td class="align-middle">{{$siswa->nama}}</td>
                  <td class="align-middle text-center">{{$siswa->nama_kelas}}</td>
                  <td class="align-middle text-center"><a class="btn btn-warning btn-sm" href="{{url('admin/student-'.$siswa->nisn.'/edit')}}">edit</a>
                        <a class="btn btn-danger btn-sm" href="{{url('admin/student-'.$siswa->nisn.'/delete')}}">delete</a>
                        <a class="btn btn-success btn-sm" href="{{url('admin/student-'.$siswa->nisn.'/detail')}}">detail</a>
                  </td>
                </tr>
              @endif
              </tbody>
            </table>
            @endif  
            <center><a class="btn btn-primary btn-md" data-toggle="modal" data-target="#add-student" href="#" title="Add class">Add Student<span class="d-none d-lg-inline-block"></a></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
   <!-- Modal Dialog - Add student
============================================= -->
<div id="add-student" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-sm-3">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a id="login-tab" class="nav-link active text-4" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Add Student</a> </li>
        </ul>
        <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="signup-tab">
            <form id="signupForm" method="post" action="{{url('admin/student/add2')}}">
            @csrf
            <label for="nisn">NISN</label>
              <div class="form-group">
                <input type="text" name="nisn" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Student's NISN">
              </div>
              <label for="nis">NIS</label>
              <div class="form-group">
                <input type="text" name="nis" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Student's NIS">
              </div>
              <label for="nama">Name</label>
              <div class="form-group">
                <input type="text" name="nama" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Student's Name">
              </div>
              <label for="address">Address</label>
              <div class="form-group">
                <input type="text" name="alamat" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Student's Address">
              </div>
              <label for="bank">Bank Number</label>
              <div class="form-group">
                <input type="text" name="bank" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Student's Bank Number">
              </div>
              <div class="form-group">
                <input type="number" value="{{$kelas->id}}" name="id" class="form-control" data-bv-field="number" id="signupEmail" required hidden placeholder="Student's Bank Number">
              </div>
              <button class="btn btn-primary btn-block" type="submit">Add data</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- Modal Dialog - Add student end -->
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