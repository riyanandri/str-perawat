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
        'no_dokumen',
        'url',
        'jenis',
        'berlaku_sd',
        'status',
        'keterangan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function getBerlakuSdAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['berlaku_sd'])->translatedFormat('l, d F Y');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
