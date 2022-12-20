<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','homeController@home');
//------------------------------------------------------------------------------------------------------
//login register for petugas and admin
Route::get('/logreg/admin','loginController@logreg_admin');
Route::post('/reg/process','loginController@reg_admin');
Route::post('/log/process','loginController@login');
//login for siswa
Route::post('/siswa-login','loginController@siswa_login');
//------------------------------------------------------------------------------------------------------
//admin
Route::get('/admin','adminController@home')->middleware('verifyAdmin');
Route::post('/admin/update-personal','adminController@update_personal_info')->middleware('verifyAdmin');
Route::post('/admin/change-password','adminController@change_password')->middleware('verifyAdmin');
Route::get('/admin/siswa-list','adminController@siswa_list')->middleware('verifyAdmin');
Route::get('/admin/class/{id}','adminController@siswa_list_class')->middleware('verifyAdmin');
Route::get('/admin/petugas-list','adminController@petugas_list')->middleware('verifyAdmin');
//admin - class crud
Route::post('/admin/kelas/add','adminController@add_kelas')->middleware('verifyAdmin');
Route::get('/admin/kelas-{id}/edit','adminController@update_kelas')->middleware('verifyAdmin');
Route::post('/admin/kelas/edit-process','adminController@update_kelas_process')->middleware('verifyAdmin');
Route::get('/admin/kelas-{id}/delete','adminController@delete_kelas')->middleware('verifyAdmin');
//admin - student crud
Route::post('/admin/student/add','adminController@add_student')->middleware('verifyAdmin');
Route::post('/admin/student/add2','adminController@add_student2')->middleware('verifyAdmin');
Route::get('/admin/student-{nisn}/detail','adminController@detail_student')->middleware('verifyAdmin');
Route::get('/admin/student-{nisn}/edit','adminController@update_student')->middleware('verifyAdmin');
Route::post('/admin/student/edit-process','adminController@update_student_process')->middleware('verifyAdmin');
Route::get('/admin/student-{nisn}/delete','adminController@delete_student')->middleware('verifyAdmin');
//admin- spp crud
Route::get('/admin/spp-{id}/delete','adminController@delete_spp')->middleware('verifyAdmin');
Route::get('/admin/spp-{id}/edit','adminController@edit_spp')->middleware('verifyAdmin');
Route::post('/admin/spp/edit-process','adminController@edit_spp_process')->middleware('verifyAdmin');
Route::get('/admin/spp-{id}/confirm','adminController@confirm_spp')->middleware('verifyAdmin');
Route::get('/admin/spp-{id}/unconfirm','adminController@unconfirm')->middleware('verifyAdmin');
//admin - petugas crud
Route::post('/admin/petugas/add','adminController@add_petugas')->middleware('verifyAdmin');
Route::get('/admin/petugas-{id}/edit','adminController@edit_petugas')->middleware('verifyAdmin');
Route::post('/admin/petugas/edit-process','adminController@edit_petugas_process')->middleware('verifyAdmin');
Route::get('/admin/petugas-{id}/delete','adminController@delete_petugas')->middleware('verifyAdmin');
Route::get('/admin/petugas-{id}/detail','adminController@detail_petugas')->middleware('verifyAdmin');
//generate report
Route::get('/pdfview/{nisn}','BestInterviewQuestionController@pdfview');
Route::get('/pdf-download/{nisn}','BestInterviewQuestionController@download');
//------------------------------------------------------------------------------------------------------
//petugas
Route::get('/petugas','petugasController@home')->middleware('verifyPetugas');
Route::get('/petugas/siswa-list','petugasController@siswa_list')->middleware('verifyPetugas');
Route::post('/petugas/update-personal','petugasController@update_personal_info')->middleware('verifyPetugas');
Route::post('/petugas/change-password','petugasController@change_password')->middleware('verifyPetugas');
Route::get('/petugas/class/{id}','petugasController@siswa_list_class')->middleware('verifyPetugas');
Route::get('/petugas/student-{nisn}/detail','petugasController@detail_student')->middleware('verifyPetugas');
Route::get('/petugas/spp-{id}/confirm','petugasController@confirm_spp')->middleware('verifyPetugas');
Route::get('/petugas/spp-{id}/unconfirm','petugasController@unconfirm')->middleware('verifyPetugas');
//------------------------------------------------------------------------------------------------------
//siswa
Route::get('/siswa','siswaController@home')->middleware('verifySiswa');
Route::post('/siswa/change-password','siswaController@change_password')->middleware('verifySiswa');
Route::get('/siswa/spp-{id}/pay','siswaController@pay')->middleware('verifySiswa');
Route::post('/siswa/spp/pay-process','siswaController@pay_process')->middleware('verifySiswa');
Route::get('/siswa/spp-{id}/cancel','siswaController@cancel')->middleware('verifySiswa');
//------------------------------------------------------------------------------------------------------
Route::get('/logout','loginController@logout');
