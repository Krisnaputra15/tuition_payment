<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;
use Validator;
use Redirect;
use App\petugas;
use App\kelas;
use App\pembayaran;
use App\siswa;
use App\spp;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{
    public function home(){
        $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                        ->where('siswa.nisn','=',Session()->get('nisn'))
                        ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas','siswa.alamat','siswa.norek')
                        ->first();
        $spp1count = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"not paid")->count();
        $spp1="";
        if($spp1count > 1){
            if($spp1count > 12){
                $spp1 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"not paid")->paginate(12);
            }
            else{
                $spp1 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"not paid")->get();
            }
        }
        if($spp1count == 1){
            $spp1 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"not paid")->first();
        }

        $spp2count = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"waiting for verification")->count();
        $spp2="";
        if($spp2count > 1){
            if($spp2count > 12){
                $spp2 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"waiting for verification")->paginate(12);
            }
            else{
                $spp2 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"waiting for verification")->get();
            }
        }
        if($spp2count == 1){
            $spp2 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"waiting for verification")->first();
        }

        $spp3count = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"verified")->count();
        $spp3="";
        if($spp3count > 1){
            if($spp3count > 12){
                $spp3 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"verified")->paginate(12);
            }
            else{
                $spp3 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"verified")->get();
            }
        }
        if($spp3count == 1){
            $spp3 = pembayaran::where('nisn',Session()->get('nisn'))->where('status',"verified")->first();
        }

        return view('murid.home',compact('siswa','spp1','spp2','spp3','spp1count','spp2count','spp3count'));
    }
    public function change_password(request $r){
        $validator = Validator::make($r->all(),[
            'oldpass'=> 'required|string|max:100',
            'newpass' => 'required|string:max:100',
            'confirmpass' => 'required|string:max:100',
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/siswa');
        }

        $pass = DB::table('siswa')->where('nisn','=',Session()->get('nisn'))
                     ->select('*')
                     ->first();

        if(md5($r->oldpass) != $pass->password){
            Session::flash('alert_warning','Existing password is not correct');
            return redirect('/siswa');
        }
        if($r->newpass != $r->confirmpass){
            Session::flash('alert_warning','Password confirmation does not match');
            return redirect('/siswa');
        }

        try{
            $update = siswa::where('nisn',Session()->get('nisn'))->update([
                'password' => md5($r->newpass),
            ]);
            Session::flash('alert_success','Password change success');
            return redirect('/siswa');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/siswa');
        }   
    }
    public function pay($id){
        $spp = pembayaran::where('id_pembayaran',$id)->first();
        return view('murid.pay',compact('spp'));
    }
    public function pay_process(request $r){
        try{
            $update = pembayaran::where('id_pembayaran',$r->id)->update([
                'bukti_bayar' => $r->file('foto')->getClientOriginalName(),
                'status' => "waiting for verification",
                'tgl_bayar' => date('Y-m-d'),
            ]);
            $tujuan_upload = 'upload/bukti/';
            $file = $r->file('foto');
            $name = $r->file('foto')->getClientOriginalName();
            $file->move(public_path($tujuan_upload),$name);

            Session::flash('alert_success','Upload payment slip success');
            return redirect('/siswa');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/siswa');
        }
    }
    public function cancel($id){
        try{
            $r = pembayaran::where('id_pembayaran',$id)->first();
            $update = pembayaran::where('id_pembayaran',$id)->update([
                'bukti_bayar' => null,
                'status' => "not paid",
                'tgl_bayar' => null,
            ]);
            $file = $r->bukti_bayar;
            Storage::delete('upload/bukti/'.$file);

            Session::flash('alert_success','Cancel upload payment slip success');
            return redirect('/siswa');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/siswa');
        }
    }
}
