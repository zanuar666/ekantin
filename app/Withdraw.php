<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = "withdraw";
    protected $primaryKey = "idWithdraw";

    // Fungsi Join Dari Tabel user
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
