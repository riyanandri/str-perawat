<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'user_id',
        'status_id',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'pend_terakhir',
        'alamat',
        'profesi_id',
        'ruangan_id',
        'pk_id',
        'area_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusPegawai()
    {
        return $this->belongsTo(StatusPegawai::class);
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function jenisPk()
    {
        return $this->belongsTo(JenisPk::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
