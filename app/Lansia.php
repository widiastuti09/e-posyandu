<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PemeriksaanLansia;

class Lansia extends Model
{
    protected $table = "lansias";
    protected $primaryKey = "id";
    // protected $fillable = [
    //     'id', 'tanggal_register', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'rt', 'rw','alamat', 
    // ];

    protected $guarded = [];
    public function pemeriksaanlansias()
  {
      return $this->hasMany(Pemeriksaanlansia::class);
  }
}
