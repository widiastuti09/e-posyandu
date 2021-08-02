<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lansia;

class Pemeriksaanlansia extends Model
{
    protected $table = "pemeriksaanlansias";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'namalansia_id' , 'tanggal_periksa', 'berat_badan', 'tinggi_badan', 'lingkar_pinggang', 'tekanan_darah',
        'glukosa_darah', 'lemak_tubuh', 'imt', 'lemak_perut', 'kolestrol', 'asam_urat', 'makan_berlemak',
        'makan_manis', 'zat_adiktif', 'jelantah', 'merokok', 'olahraga', 'keterangan','penyakit'
    ];
    public function lansias()
    {
        return $this->belongsTo(Lansia::class, 'namalansia_id');
    }
}
