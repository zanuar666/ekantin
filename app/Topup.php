<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    protected $table = "topupredeem";
    protected $primaryKey = "idTopup";

    // Fungsi Join Tabel TopupHistory
    public function topupHistory()
    {
        return $this->hasMany('App\TopupHistory', 'idTopup');
    }
}
