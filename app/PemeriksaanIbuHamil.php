<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ibuhamil;

class PemeriksaanIbuHamil extends Model
{
    protected $guarded = [];

    public function ibuhamil() {
        return $this->belongsTo(Ibuhamil::class, 'id_ibu');
    }
}
