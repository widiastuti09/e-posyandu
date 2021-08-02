<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ibuhamil;

class Bumilresti extends Model
{
    protected $guarded= [];

    public function ibuhamil(){
        return $this->belongsTo(Ibuhamil::class, 'id_ibu');
    }
}
