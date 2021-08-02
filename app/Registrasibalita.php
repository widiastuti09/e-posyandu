<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penimbangan;

class Registrasibalita extends Model
{
    protected $table = "registrasibalitas";
    protected $primaryKey = "id";
    // protected $fillable = [
    //     'id', 'namabalita','tempatlahir', 'tanggallahir','jeniskelamin','namaayah', 'namaibu', 'rt', 'rw', 'usia','bblahir','pblahir','nokk','nikbalita','telp'   
    // ];

    protected $guarded = [];
    public function penimbangans()
    {
        return $this->hasMany(Penimbangan::class);
    }
} 
