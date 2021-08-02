<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwallansia extends Model
{
    protected $table = "jadwallansias";
    protected $primaryKey = "id";
    protected $guarded = [];
    public function jadwallansias()
    {
        return $this->hasMany(Jadwallansias::class);
    }
}
