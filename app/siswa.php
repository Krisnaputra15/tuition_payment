<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = "siswa";
    protected $fillable = ['nisn','nis','nama','id_kelas','id_jurusan','alamat','norek','password'];
    public $timestamps = false;
}
