<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    protected $primaryKey = "roleId";

    // relasi dari tabel user
    public function user(){
        return $this->hasOne('App\User','roleId');
    }
}
