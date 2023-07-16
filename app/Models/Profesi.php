<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;
    protected $table = 'profesi';

    protected $fillable = [
        'nama_profesi',
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
        return $this->hasMany(Pegawai::class);
    }
}
