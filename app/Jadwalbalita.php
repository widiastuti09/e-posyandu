<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalbalita extends Model
{
    protected $table = "jadwalbalitas";
    protected $primaryKey = "id";
    protected $guarded = [];
    public function jadwalbalitas()
    {
        return $this->hasMany(Jadwalbalita::class);
    }

}
