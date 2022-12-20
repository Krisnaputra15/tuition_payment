<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['id','nama_kelas'];
    public $timestamps = false;
}
