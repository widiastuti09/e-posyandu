<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalbumil extends Model
{
    protected $table = "jadwalbumils";
    protected $primaryKey = "id";
    protected $guarded = [];
    public function jadwalbumils()
    {
        return $this->hasMany(Jadwalbumils::class);
    }

}
