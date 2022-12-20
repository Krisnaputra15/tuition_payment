<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;
use Validator;
use App\petugas;
use Illuminate\Support\Facades\File;

class loginController extends Controller
{
    public function logreg_admin(){
        return view('admin.logreg');
    }
    public function reg_admin(request $r){
        $validator = Validator::make($r->all(),[
            'nama'=> 'required|string|max:100',
            'username' => 'required|string:max:100',
            'password' => 'required',
            'auth_code' => 'required|string|max:10'
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/logreg/admin');
        }

        //authentication process
        $auth_code = "MOKLETJAYA";
        if($r->auth_code != $auth_code){
            Session::flash('alert_warning','Wrong authentication code inserted');
            return redirect('/logreg/admin');
        }
        //username auth
        $cek = petugas::where('username',$r->username)->count();
        if($cek > 0){
            Session::flash('alert_warning','Username has been registered');
            return redirect('/logreg/admin');
        }

        try{
            $register = petugas::create([
                'username' => $r->username,
                'password' => md5($r->password),
                'nama_petugas' => $r->nama,
                'level' => "admin"
            ]);
            Session::flash('alert_success','Register success');
            return redirect('/logreg/admin');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('logreg/admin');
        }
    }
    public function login(request $r){
        $validator = Validator::make($r->all(),[
            'username' => 'required|string:max:100',
            'password' => 'required',
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/logreg/admin');
        }
    
        try{
            $login = DB::table('petugas')->where('username','=',$r->username)
                     ->where('password','=',md5($r->password))
                     ->select('*')
                     ->first();
            
            if($login){
                Session::put('id_petugas',$login->id_petugas);
                Session::put('nama',$login->nama_petugas);
                Session::put('username',$login->username);
                Session::put('level',$login->level);

                if(Session()->get('level') == "admin"){
                    return redirect('/admin');
                }
                else{
                    return redirect('/petugas');
                }
            }
            else{
                Session::flash('alert_warning','Wrong username or password');
                return redirect('/logreg/admin');
            }
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('logreg/admin');
        }
    }
    public function siswa_login(request $r){
        try{
            $login = DB::table('siswa')->where('nisn','=',$r->nisn)
                     ->where('password','=',md5($r->password))
                     ->select('*')
                     ->first();
            
            if($login){
                Session::put('nisn',$login->nisn);
                    return redirect('/siswa');
                }
            else{
                Session::flash('alert_warning','Wrong username or password');
                return redirect('/');
            }
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
