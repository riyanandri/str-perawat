<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSipp extends Model
{
    use HasFactory;
    protected $table = 'detail_sipp';

    protected $fillable = [
        'dok_id',
        'no_sipp',
        'berlaku_sd',
        'ket_sipp',
        'status',
    ];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
