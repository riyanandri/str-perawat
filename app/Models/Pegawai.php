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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function statusPegawai()
    {
        return $this->belongsTo(StatusPegawai::class, 'status_id', 'id');
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'profesi_id', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function jenisPk()
    {
        return $this->belongsTo(JenisPk::class, 'pk_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
}
