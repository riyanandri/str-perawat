<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPk extends Model
{
    use HasFactory;
    protected $table = 'jenis_pk';

    protected $fillable = [
        'nama_pk',
    ];
}
