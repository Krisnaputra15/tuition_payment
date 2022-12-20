<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\petugas;
use App\kelas;
use App\pembayaran;
use App\siswa;
use App\spp;

class BestInterviewQuestionController extends Controller
{
public function pdfview($nisn)
{
    setlocale (LC_MONETARY, 'id_ID');
    $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                               ->where('siswa.nisn','=',$nisn)
                               ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas','siswa.alamat','siswa.norek')
                               ->first();
    $spp1count = pembayaran::where('nisn',$nisn)->where('status',"not paid")->count();
    $spp1="";
    if($spp1count > 1){
            $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->get();
    }
    if($spp1count == 1){
        $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->first();
    }

    $spp2count = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->count();
    $spp2="";
    if($spp2count > 1){
            $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->get();
    }
    if($spp2count == 1){
        $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->first();
    }

    $spp3count = pembayaran::where('nisn',$nisn)->where('status',"verified")->count();
    $spp3="";
    if($spp3count > 1){
            $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->get();
    }
    if($spp3count == 1){
        $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->first();
    }
return view('pdfview',['siswa'=>$siswa,'spp1'=>$spp1,'spp2'=>$spp2,'spp3'=>$spp3,'spp1count'=>$spp1count,'spp2count'=>$spp2count,'spp3count'=>$spp3count]);
}
public function download($nisn)
    {
        setlocale (LC_MONETARY, 'id_ID');
    	$siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                               ->where('siswa.nisn','=',$nisn)
                               ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas','siswa.alamat','siswa.norek')
                               ->first();
    $spp1count = pembayaran::where('nisn',$nisn)->where('status',"not paid")->count();
    $spp1="";
    if($spp1count > 1){
            $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->get();
    }
    if($spp1count == 1){
        $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->first();
    }

    $spp2count = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->count();
    $spp2="";
    if($spp2count > 1){
            $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->get();
    }
    if($spp2count == 1){
        $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->first();
    }

    $spp3count = pembayaran::where('nisn',$nisn)->where('status',"verified")->count();
    $spp3="";
    if($spp3count > 1){
            $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->get();
    }
    if($spp3count == 1){
        $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->first();
    }
 
    	$pdf = PDF::loadview('pdfdownload',['siswa'=>$siswa,'spp1'=>$spp1,'spp2'=>$spp2,'spp3'=>$spp3,'spp1count'=>$spp1count,'spp2count'=>$spp2count,'spp3count'=>$spp3count]);
    	return $pdf->download("Tuition-Fee-Report.pdf");
    }
}
