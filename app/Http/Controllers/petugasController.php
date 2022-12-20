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

class petugasController extends Controller
{
    public function home(){
        return view('petugas.home');
    }
    public function update_personal_info(request $r){
        $validator = Validator::make($r->all(),[
            'nama'=> 'required|string|max:100',
            'username' => 'required|string:max:100',
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/petugas');
        }
        $count = petugas::where('username',$r->username)->count();
        if($count > 1){
            Session::flash('alert_warning','Username has been registered, please choose another username');
            return redirect('/petugas');
        }
        try{
            $update = petugas::where('id_petugas',Session()->get('id_petugas'))->update([
                'nama_petugas' => $r->nama,
                'username' => $r->username,
            ]);
            if($update){
                Session::forget('nama');
                Session::forget('username');
                Session::put('nama',$r->nama);
                Session::put('username',$r->username);

                Session::flash('alert_success',"Update data success");
                return redirect('/petugas');
            }
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/petugas');
        }
    }
    public function change_password(request $r){
        $validator = Validator::make($r->all(),[
            'oldpass'=> 'required|string|max:100',
            'newpass' => 'required|string:max:100',
            'confirmpass' => 'required|string:max:100',
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/petugas');
        }

        $pass = DB::table('petugas')->where('id_petugas','=',Session()->get('id_petugas'))
                     ->select('*')
                     ->first();

        if(md5($r->oldpass) != $pass->password){
            Session::flash('alert_warning','Existing password is not correct');
            return redirect('/petugas');
        }
        if($r->newpass != $r->confirmpass){
            Session::flash('alert_warning','Password confirmation does not match');
            return redirect('/petugas');
        }

        try{
            $update = petugas::where('id_petugas',Session()->get('id_petugas'))->update([
                'password' => md5($r->newpass),
            ]);
            Session::flash('alert_success','Password change success');
            return redirect('/petugas');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/petugas');
        }   
    }
    public function siswa_list(){
        setlocale (LC_MONETARY, 'id_ID');
        try{
            $i = 1;
            $kelas = kelas::all();
            $kelascount = kelas::count();
            $siswacount = siswa::count();
            $siswa="";
            if($siswacount == 1){
                $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                         ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas')
                         ->first();
            }
            if($siswacount > 1){
                $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                         ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas')
                         ->get();
            }
            return view('petugas.siswa_list',compact('kelas','siswa','kelascount','siswacount','i'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/petugas');
        } 
    }
    public function siswa_list_class($id){
        try{
            $i = 1;
            $siswacount = siswa::where('id_kelas',$id)->count();
            $kelas = kelas::where('id',$id)->first();
            $siswa="";
            if($siswacount == 1){
                $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                         ->where('siswa.id_kelas','=',$id)
                         ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas')
                         ->first();
            }
            if($siswacount > 1){
                $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                         ->where('siswa.id_kelas','=',$id)
                         ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas')
                         ->get();
            }
            return view('petugas.siswa_list_class',compact('siswa','siswacount','kelas'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect()->back();
        } 
    }
    public function detail_student($nisn){
        $siswa = DB::table('siswa')->join('kelas','kelas.id','=','siswa.id_kelas')
                        ->where('siswa.nisn','=',$nisn)
                        ->select('siswa.nisn','siswa.nama','siswa.nis','kelas.nama_kelas','siswa.alamat','siswa.norek')
                        ->first();
        $spp1count = pembayaran::where('nisn',$nisn)->where('status',"not paid")->count();
        $spp1="";
        if($spp1count > 1){
            if($spp1count > 12){
                $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->paginate(12);
            }
            else{
                $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->get();
            }
        }
        if($spp1count == 1){
            $spp1 = pembayaran::where('nisn',$nisn)->where('status',"not paid")->first();
        }

        $spp2count = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->count();
        $spp2="";
        if($spp2count > 1){
            if($spp2count > 12){
                $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->paginate(12);
            }
            else{
                $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->get();
            }
        }
        if($spp2count == 1){
            $spp2 = pembayaran::where('nisn',$nisn)->where('status',"waiting for verification")->first();
        }

        $spp3count = pembayaran::where('nisn',$nisn)->where('status',"verified")->count();
        $spp3="";
        if($spp3count > 1){
            if($spp3count > 12){
                $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->paginate(12);
            }
            else{
                $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->get();
            }
        }
        if($spp3count == 1){
            $spp3 = pembayaran::where('nisn',$nisn)->where('status',"verified")->first();
        }

        return view('petugas.siswa_detail',compact('siswa','spp1','spp2','spp3','spp1count','spp2count','spp3count'));
    }
    public function confirm_spp($id){
        try{
            $confirm = pembayaran::where('id_pembayaran',$id)->update([
                'id_petugas' => Session()->get('id_petugas'),
                'status' => "verified",
            ]);
            Session::flash('alert_success',"Tuition fee payment confirmation success");
            return Redirect::back();
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return Redirect::back();
        } 
    }
    public function unconfirm($id){
        try{
            $unconfirm = pembayaran::where('id_pembayaran',$id)->update([
                'id_petugas' => Session()->get('id_petugas'),
                'status' => 'not paid',
                'bukti_bayar' => null
            ]);
            Session::flash('alert_success',"Tuition fee payment unconfirmation success");
            return Redirect::back();
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return Redirect::back();
        } 
    }
}
