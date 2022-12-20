<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    protected $table = "spp";
    protected $fillable = ['id','bulan','nominal'];
    public $timestamps = false;
}
