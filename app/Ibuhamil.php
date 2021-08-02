<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibuhamil extends Model
{
    protected $table = "ibuhamils";
    protected $primaryKey = "id";
    // protected $fillable = [
    //     'id', 'nama', 'tgllahir', 'namasuami', 'goldarah', 'tinggibadan', 'usia', 'hemoglobin', 'hpht', 'htp', 'beratbadan', 'rt', 'rw', 'hamilke', 'persalinanke', 'keguguranke', 'telp', 'tglregister'
    // ];

    protected $guarded = [];
}
