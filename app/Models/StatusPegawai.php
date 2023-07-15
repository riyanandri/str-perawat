<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'status_pegawai';

    protected $fillable = [
        'nama_status',
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('l, j F Y : h:i a');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'status_id', 'id');
    }
}
