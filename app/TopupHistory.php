<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupHistory extends Model
{
    protected $table = "topuphistory";
    protected $primaryKey = "idTopupHist";

    // Fungsi Join Dari Tabel User
    public function user(){
        return $this->belongsTo('App\User','userId');
    }

    // Fungsi Join Dari Tabel Topup
    public function topup(){
        return $this->belongsTo('App\Topup','idTopup');
    }
}
