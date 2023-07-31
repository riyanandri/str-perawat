<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'pegawai_id',
        'url',
        'status',
        'jenis',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function str()
    {
        return $this->hasOne(DetailStr::class);
    }

    public function sipp()
    {
        return $this->hasOne(DetailSipp::class);
    }

    public function spkk()
    {
        return $this->hasOne(DetailSpkk::class);
    }
}
