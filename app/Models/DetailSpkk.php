<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSpkk extends Model
{
    use HasFactory;
    protected $table = 'detail_spkk';

    protected $fillable = [
        'dok_id',
        'kompetensi',
        'no_spkk',
        'berlaku_sd',
        'ket_spkk',
        'status',
    ];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
