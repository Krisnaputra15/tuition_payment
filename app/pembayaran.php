<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = ['id_pembayaran','id_petugas','nisn','bulan_tahun_spp','tgl_bayar','bulan_bayar','tahun_bayar',
                           'jumlah_bayar','bukti_bayar','status','created_at'];
    public $timestamps = false;
}
