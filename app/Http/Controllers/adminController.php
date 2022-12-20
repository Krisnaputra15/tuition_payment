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

class adminController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    public function update_personal_info(request $r){
        $validator = Validator::make($r->all(),[
            'nama'=> 'required|string|max:100',
            'username' => 'required|string:max:100',
        ]);

        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('/admin');
        }
        $count = petugas::where('username',$r->username)->count();
        if($count > 1){
            Session::flash('alert_warning','Username has been registered, please choose another username');
            return redirect('/admin');
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
                return redirect('/admin');
            }
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin');
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
            return redirect('/admin');
        }

        $pass = DB::table('petugas')->where('id_petugas','=',Session()->get('id_petugas'))
                     ->select('*')
                     ->first();

        if(md5($r->oldpass) != $pass->password){
            Session::flash('alert_warning','Existing password is not correct');
            return redirect('/admin');
        }
        if($r->newpass != $r->confirmpass){
            Session::flash('alert_warning','Password confirmation does not match');
            return redirect('/admin');
        }

        try{
            $update = petugas::where('id_petugas',Session()->get('id_petugas'))->update([
                'password' => md5($r->newpass),
            ]);
            Session::flash('alert_success','Password change success');
            return redirect('/admin');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin');
        }   
    }
    public function siswa_list(){
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
            return view('admin.siswa_list',compact('kelas','siswa','kelascount','siswacount','i'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin');
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
            return view('admin.siswa_list_class',compact('siswa','siswacount','kelas'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect()->back();
        } 
    }
    public function add_kelas(request $r){
        try{
            $create = kelas::create([
                'nama_kelas' => $r->kelas
            ]);
            Session::flash('alert_success',"adding class success");
            return redirect('admin/siswa-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/siswa-list');
        } 
    }
    public function update_kelas($id){
        $kelas = kelas::where('id',$id)->first();
        return view('admin.edit_class',compact('kelas'));
    }
    public function update_kelas_process(request $r){
        try{
            $update = kelas::where('id',$r->id)->update([
                'nama_kelas' => $r->kelas
            ]);
            Session::flash('alert_success',"edit class success");
            return redirect('admin/siswa-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/siswa-list');
        } 
    }
    public function delete_kelas($id){
        try{
            $delete = kelas::where('id',$id)->delete();
            Session::flash('alert_success',"delete class success");
            return redirect('admin/siswa-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/siswa-list');
        } 
    }
    public function add_student(request $r){
        $check1 = siswa::where('nis',$r->nis)->count();
        $check2 = siswa::where('nisn',$r->nisn)->count();
        if($check1 == 0 && $check2 == 0){
            try{
                $create = siswa::create([
                    'nisn' => $r->nisn,
                    'nis' => $r->nis,
                    'nama' => $r->nama,
                    'id_kelas' => $r->kelas,
                    'alamat' => $r->alamat,
                    'norek' => $r->bank,
                    'password' => md5($r->nisn),
                ]);
                $class_check = kelas::where('id',$r->kelas)->first(); 
                $sentence = strtok($class_check->nama_kelas, " ");
                $year = date('Y');
                Session::put('created_at',date('Y-m-d H:i:s'));
                Session::save();
                $created_at = Session()->get('created_at');
                if($sentence == "10"){
                    for($i = $year;$i <= $year+2;$i++){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                elseif($sentence == "12"){
                    for($i = $year;$i >= $year-2;$i--){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                else{
                    for($i = $year;$i <= $year+1;$i++){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                    for($i = $year-1;$i >= $year-1;$i--){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                Session::flash('alert_success',"adding student success");
                return redirect('admin/siswa-list');
            }
            catch(\exception $e){
                $message = $e->getMessage();
                Session::flash('alert_warning',$message);
                return redirect('/admin/siswa-list');
            }
        }
        else{
            Session::flash('alert_warning',"NIS or NISN has been registered");
            return redirect('/admin/siswa-list');
        } 
    }
    public function add_student2(request $r){
        $check1 = siswa::where('nis',$r->nis)->count();
        $check2 = siswa::where('nisn',$r->nisn)->count();
        if($check1 == 0 && $check2 == 0){
            try{
                $create = siswa::create([
                    'nisn' => $r->nisn,
                    'nis' => $r->nis,
                    'nama' => $r->nama,
                    'id_kelas' => $r->id,
                    'alamat' => $r->alamat,
                    'norek' => $r->bank,
                    'password' => md5($r->nisn),
                ]);
                $class_check = kelas::where('id',$r->id)->first(); 
                $sentence = strtok($class_check->nama_kelas, " ");
                $year = date('Y');
                Session::put('created_at',date('Y-m-d H:i:s'));
                Session::save();
                $created_at = Session()->get('created_at');
                if($sentence == "10"){
                    for($i = $year;$i <= $year+2;$i++){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                elseif($sentence == "12"){
                    for($i = $year;$i >= $year-2;$i--){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                else{
                    for($i = $year;$i <= $year+1;$i++){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                    for($i = $year-1;$i >= $year-1;$i--){
                        for($j = 1;$j <= 12;$j++){
                            $spp_get = spp::where('id',$j)->first();
                            $create_spp = pembayaran::create([
                                'nisn' => $r->nisn,
                                'bulan_tahun_spp' => $spp_get->bulan." ".$i,
                                'jumlah_bayar' => $spp_get->nominal,
                                'status' => "not paid",
                                'created_at' => $created_at,
                            ]);
                        }
                    }
                }
                Session::flash('alert_success',"adding student success");
                return redirect('admin/class/'.$r->id);
            }
            catch(\exception $e){
                $message = $e->getMessage();
                Session::flash('alert_warning',$message);
                return redirect('/admin/class/'.$r->id);
            }
        }
        else{
            Session::flash('alert_warning',"NIS or NISN has been registered");
            return redirect('/admin/class/'.$r->id);
        } 
    }
    public function update_student($nisn){
        $kelas = kelas::all();
        $kelascount = kelas::count();
        $student = siswa::where('nisn',$nisn)->first();
        return view('admin.edit_student',compact('student','kelas','kelascount'));
    }
    public function update_student_process(request $r){
        try{
            $update = siswa::where('nisn',$r->old_nisn)->update([
                'nisn' => $r->nisn,
                'nis' => $r->nis,
                'nama' => $r->nama,
                'alamat' => $r->alamat,
                'norek' => $r->bank,
            ]);
            Session::flash('alert_success',"edit student success");
            return redirect('admin/siswa-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/siswa-list');
        } 
    }
    public function delete_student($nisn){
        try{
            $delete2 = pembayaran::where('nisn',$nisn)->delete();
            $delete1 = siswa::where('nisn',$nisn)->delete();
            Session::flash('alert_success',"delete student success");
            return redirect('admin/siswa-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/siswa-list');
        } 
    }
    public function detail_student($nisn){
        setlocale (LC_MONETARY, 'id_ID');
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

        return view('admin.siswa_detail',compact('siswa','spp1','spp2','spp3','spp1count','spp2count','spp3count'));
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
    public function delete_spp($id){
        try{
            $delete = pembayaran::where('id_pembayaran',$id)->delete();
            Session::flash('alert_success',"Tuition fee deleted successfully");
            return Redirect::back();
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return Redirect::back();
        } 
    }
    public function edit_spp($id){
        try{
            $spp = pembayaran::where('id_pembayaran',$id)->first();
            $siswa = siswa::where('nisn',$spp->nisn)->first();
            return view('admin.edit_spp',compact('spp','siswa'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return Redirect::back();
        } 
    }
    public function edit_spp_process(request $r){
        try{
            $update = pembayaran::where('id_pembayaran',$r->id)->update([
                'bulan_tahun_spp' => $r->bulantahunspp,
                'jumlah_bayar' => $r->amount,
                'status' => $r->status
            ]);
            Session::flash('alert_success',"Tuition fee updated successfully");
            return redirect('/admin/student-'.$r->nisn.'/detail');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return Redirect::back();
        } 
    }
    public function petugas_list(){
        try{
            $petugascount = petugas::where('level',"petugas")->count();
            $petugas = "";
            if($petugascount > 1){
                    $petugas = petugas::where('level',"petugas")->get();
            }
            if($petugascount == 1){
                $petugas = petugas::where('level',"petugas")->first();
            }
            return view('admin.petugas_list',compact('petugascount','petugas'));
            
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin');
        } 
    }
    public function add_petugas(request $r){
        $cek = petugas::where('username',$r->username)->count();
        if($cek > 0){
            Session::flash('alert_warning','Username has been registered');
            return redirect('/admin/petugas-list');
        }
        try{
            $create = petugas::create([
                'username' => $r->username,
                'password' => md5($r->username),
                'nama_petugas' => $r->nama,
                'level' => "petugas"
            ]);
            Session::flash('alert_success',"Petugas added successfully");
            return redirect('/admin/petugas-list');;
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/petugas-list');
        } 
    }
    public function edit_petugas($id){
        try{
            $petugas = petugas::where('id_petugas',$id)->first();
            return view('admin.edit_petugas2',compact('petugas'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/petugas-list');
        } 
    }
    public function edit_petugas_process(request $r){
        $cek = petugas::where('username',$r->username)->count();
        if($cek > 1){
            Session::flash('alert_warning','Username has been registered');
            return redirect('/admin/petugas-list');
        }
        try{
            $petugas = petugas::where('id_petugas',$r->id)->update([
                'nama_petugas' => $r->nama,
                'username' => $r->username,
                'password' => md5($r->username),
            ]);
            Session::flash('alert_success',"Petugas information edited successfully");
            return redirect('/admin/petugas-list');;
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/petugas-list');
        } 
    }
    public function delete_petugas($id){
        try{
            $delete = petugas::where('id_petugas',$id)->delete();
            Session::flash('alert_success',"Petugas data deleted successfully");
            return redirect('/admin/petugas-list');
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/petugas-list');
        } 
    }
    public function detail_petugas($id){
        try{
            $petugas = petugas::where('id_petugas',$id)->first();
            return view('admin.petugas_detail',compact('petugas'));
        }
        catch(\exception $e){
            $message = $e->getMessage();
            Session::flash('alert_warning',$message);
            return redirect('/admin/petugas-list');
        } 
    }
}
