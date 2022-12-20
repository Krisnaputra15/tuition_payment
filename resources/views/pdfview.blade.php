<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>pdf</title>
<meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/font-awesome/css/fontawesome.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/owl.carousel/assets/owl.carousel.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/owl.carousel/assets/owl.theme.default.min.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('vendor/daterangepicker/daterangepicker.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('css/stylesheet.css') !!}" />
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}


}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
</head>

<body>
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
        </i><a href="{{url('/pdf-download/'.$siswa->nisn)}}" style="text-decoration:none;color:white;" class="btn btn-success btn-sm" target="_blank"> Export as PDF</a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="{!! asset('images/logo.png') !!}" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            QUICKAI
                            </a>
                        </h2>
                        <div>455 Foggy Heights, AZ 85004, US</div>
                        <div>(123) 456-789</div>
                        <div>company@example.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">TO:</div>
                        <h2 class="to">{{$siswa->nama}}</h2>
                        <div class="address">{{$siswa->alamat}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Report</h1>
                        <div class="date">Date Generated: {{date('l\, jS \of F Y ')}}</div>
                    </div>
                </div>
                <p>Dear {{$siswa->nama}}.</p>
                <p>We just want to inform you that you have <b>{{$spp1count}} unpaid tuition fee(s)</b> , <b>{{$spp2count}}
                    pending tuition payment(s)</b>, and <b>{{$spp3count}} paid tuition fee(s)</b>.</p>  
                <p>Below are the report of your tuition fees dependent(s)</p>
                
                <h4><b>Unpaid tuition fee(s)</b></h6>
                @if($spp1count != 0)
              <table class="table">
                <thead>
                  <tr>
                    <th>Month and Year</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp1count > 1)
                @foreach($spp1 as $s)
                  <tr>
                    <td>{{$s->bulan_tahun_spp}}</td>
                    <td>Rp{{$s->jumlah_bayar}}</td>
                    <td>{{$s->status}}</td>
                  </tr>
                @endforeach
                @else
                <tr>
                    <td>{{$spp1->bulan_tahun_spp}}</td>
                    <td>Rp{{$spp1->jumlah_bayar}}</td>
                    <td>{{$spp1->status}}</td>
                  </tr>
                @endif
                </tbody>
              </table>
              @else
              <h6 style="color:green;"><b>You have paid all of your tuition fee(s)  </b></h6>
              @endif
              <br>
              <h4><b>Pended tuition fee payment(s)</b></h6>
                @if($spp2count != 0)
              <table class="table">
                <thead>
                  <tr>
                    <th>Month and Year</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp2count > 1)
                @foreach($spp2 as $s)
                  <tr>
                    <td>{{$s->bulan_tahun_spp}}</td>
                    <td>Rp{{$s->jumlah_bayar}}</td>
                    <td>Pended</td>
                  </tr>
                @endforeach
                @else
                <tr>
                    <td>{{$spp2->bulan_tahun_spp}}</td>
                    <td>Rp{{$spp2->jumlah_bayar}}</td>
                    <td>Pended</td>
                  </tr>
                @endif
                </tbody>
              </table>
              @else
              <h6 style="color:green;"><b>You do not have any pended tutiton fee payment</b></h6>
              @endif
              <br>
              <h4><b>Paid tuition fee(s)</b></h6>
                @if($spp3count != 0)
              <table class="table">
                <thead>
                  <tr>
                    <th>Month and Year</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($spp3count > 1)
                @foreach($spp3 as $s)
                  <tr>
                    <td>{{$s->bulan_tahun_spp}}</td>
                    <td>Rp{{$s->jumlah_bayar}}</td>
                    <td>Paid</td>
                  </tr>
                @endforeach
                @else
                <tr>
                    <td>{{$spp3->bulan_tahun_spp}}</td>
                    <td>Rp{{$spp3->jumlah_bayar}}</td>
                    <td>Paid</td>
                  </tr>
                @endif
                </tbody>
              </table>
              @else
              <h6 style="color:green;"><b>You have not paid any of your tuition fee(s) yet</b></h6>
              @endif
              <br> 
              <p>If you still have tuition fee dependents, please pay it as soon as possible. </p>
              <p>And if you have paid all of your tuition fee dependents, we sincerely give our big respect for you.</p>  
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="thanks">Thank you!</div>
            </main>
            <footer>
                Report was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</div>
<!-- Document Wrapper end -->
<script>
$('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
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
</body>
</html>