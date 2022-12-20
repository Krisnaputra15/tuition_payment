@extends('template.siswa')

@section('judul')
Your profile page
@endsection

@section('konten')
<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1>Profile page</h1>
        </div>
        <div class="col-md-4">
          <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
            <li><a href="http://demo.harnishdesign.net/html/quickai/index.html">Home</a></li>
            <li class="active"> profile</li>
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
              <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Change Password</a> </li>
              <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="secondTab" aria-selected="false">Tuition Fee Dependents</a> </li>
              <li class="nav-item"> <a class="nav-link" id="second-tab" href="{{url('/logout')}}" >Logout</a> </li>
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
            <label for="nisn">NISN</label>
              <div class="form-group">
                <input type="text" name="nisn" value="{{$siswa->nisn}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's NISN">
              </div>
              <label for="nis">NIS</label>
              <div class="form-group">
                <input type="text" name="nis" value="{{$siswa->nis}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's NIS">
              </div>
              <label for="nama">Name</label>
              <div class="form-group">
                <input type="text" name="nama" value="{{$siswa->nama}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's Name">
              </div>
              <label for="address">Address</label>
              <div class="form-group">
                <input type="text" name="alamat" value="{{$siswa->alamat}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's Address">
              </div>
              <label for="address">Class</label>
              <div class="form-group">
                <input type="text" name="kelas" value="{{$siswa->nama_kelas}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's Address">
              </div>
              <label for="address">Bank Number</label>
              <div class="form-group">
                <input type="text" name="kelas" value="{{$siswa->norek}}" class="form-control" data-bv-field="number" id="signupEmail" required disabled placeholder="Student's Address">
                <p style="color:grey;"><i>*BTN Bank</i></p>
              </div>
            </form>
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
              <div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="second-tab">
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
                    <h4 class="mb-4">Change Password</h4>
                    <form method="post" action="{{url('/siswa/change-password')}}">
                    @csrf
                      <div class="form-group">
                        <input type="password" class="form-control" name="oldpass" id="existingPassword" required placeholder="Existing Password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="newpass" id="newPassword" required placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="confirmpass" id="confirmPassword" required placeholder="Confirm Password">
                      </div>
                      <button class="btn btn-primary" type="submit">Update Password</button>
                    </form>
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
              <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="second-tab">
                <div class="row">
                  <div class="col-lg-12">
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
                    <h4 class="mb-4">Tuition Fee Dependents</h4>
                    <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Unpaid</a> </li>
          <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Need Verification</a> </li>
          <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Verified</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
            <div class="table-responsive-md">
            @if($spp1count != 0)
              <table class="table table-hover border">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">Month and Year</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp1count > 1)
                @foreach($spp1 as $s)
                  <tr>
                    <td class="text-center">{{$s->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$s->jumlah_bayar}}</td>
                    <td class="text-center">{{$s->status}}</td>
                    <td class="text-center text-right">
                        <a class="btn btn-success btn-sm" href="{{url('/siswa/spp-'.$s->id_pembayaran.'/pay')}}">Pay</a>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center">{{$spp1->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$spp1->jumlah_bayar}}</td>
                    <td class="text-center">{{$spp1->status}}</td>
                    <td class="text-center">
                    <a class="btn btn-success btn-sm" href="{{url('/siswa/spp-'.$spp1->id_pembayaran.'/pay')}}">Pay</a>
                    </td>
                  </tr>
                @endif
                </tbody>
              </table>
              @if($spp1count > 12)
              <center>
              {{$spp1->links()}}
              </center>
              @endif
              @else
              <h6 style="color:green;"><b>You do not have any tuition fees dependents</b></h6>
              @endif
            </div>
          </div>
          <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
          <div class="table-responsive-md">
          @if($spp2count != 0)
              <table class="table table-hover border">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">Month and Year</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp2count > 1)
                @foreach($spp2 as $s)
                  <tr>
                    <td class="text-center">{{$s->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$s->jumlah_bayar}}</td>
                    <td class="text-center">{{$s->status}}</td>
                    <td class="text-center text-right">
                    @if($s->bukti_bayar != null)
                    <a class="btn btn-primary btn-sm" href="{{'upload/bukti/'.$s->bukti_bayar}}" target="_blank">Show slip</a>
                    @else
                    <a class="btn btn-danger btn-sm" href="#">No Payment Slip</a> 
                    @endif  
                        <a class="btn btn-danger btn-sm" href="{{url('/siswa/spp-'.$s->id_pembayaran.'/cancel')}}">Cancel</a>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center">{{$spp2->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$spp2->jumlah_bayar}}</td>
                    <td class="text-center">{{$spp2->status}}</td>
                    <td class="text-center">
                    @if($spp2->bukti_bayar != null)
                    <a class="btn btn-primary btn-sm" href="{{url('upload/bukti/'.$spp2->bukti_bayar)}}" target="_blank">Show slip</a>
                    @else
                    <a class="btn btn-danger btn-sm" href="#">No Payment Slip</a> 
                    @endif      
                    <a class="btn btn-danger btn-sm" href="{{url('/siswa/spp-'.$spp2->id_pembayaran.'/cancel')}}">Cancel</a>
                    </td>
                  </tr>
                @endif
                </tbody>
              </table>
              @if($spp2count > 12)
              <center>
              {{$spp2->links()}}
              </center>
              @endif
              @else
              <center><h6 style="color:grey;"><b>You do not have any tuition fees dependents which need to be verified</b></h6></center>
              @endif
            </div>
          </div>
          <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
            <div class="table-responsive-md">
            @if($spp3count != 0)
              <table class="table table-hover border">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">Month and Year</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp3count > 1)
                @foreach($spp3 as $s)
                  <tr>
                    <td class="text-center">{{$s->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$s->jumlah_bayar}}</td>
                    <td class="text-center">{{$s->status}}</td>
                    @if($s->bukti_bayar != null)
                    <a class="btn btn-primary btn-sm" href="{{url('upload/bukti/'.$s->bukti_bayar)}}" target="_blank">Show slip</a>
                    @else
                    <a class="btn btn-primary btn-sm" href="#">No Payment Slip</a> 
                    @endif  
                  </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center">{{$spp3->bulan_tahun_spp}}</td>
                    <td class="text-center">Rp{{$spp3->jumlah_bayar}}</td>
                    <td class="text-center">{{$spp3->status}}</td>
                    <td class="text-center">
                    @if($spp3->bukti_bayar != null)
                    <a class="btn btn-primary btn-sm" href="{{url('upload/bukti/'.$spp3->bukti_bayar)}}" target="_blank">Show slip</a>
                    @else
                    <a class="btn btn-primary btn-sm" href="#">No Payment Slip</a> 
                    @endif      
                    </td>
                  </tr>
                @endif
                </tbody>
              </table>
              @if($spp3count > 12)
              <center>
              {{$spp3->links()}}
              </center>
              @endif
              @else
              <center><h6 style="color:red;"><b>You have not paid any tuition fees</b></h6></center>
              @endif
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
    </div>
  </div><!-- Content end -->
@endsection

@section('js')
<script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> 
<script src="{!! asset('vendor/owl.carousel/owl.carousel.min.js') !!}"></script> 
<script src="{!! asset('vendor/bootstrap-spinner/bootstrap-spinner.js') !!}"></script> 
<script src="{!! asset('vendor/daterangeslipker/moment.min.js') !!}"></script> 
<script src="{!! asset('vendor/daterangeslipker/daterangeslipker.js') !!}"></script> 
<script>
$(function() {
 'use strict';
  // Birth Date
  $('#birthDate').daterangeslipker({
	singleDateslipker: true,
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
