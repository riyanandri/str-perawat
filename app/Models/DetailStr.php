<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailStr extends Model
{
    use HasFactory;

    protected $table = 'detail_str';

    protected $fillable = [
        'dok_id',
        'no_str',
        'berlaku_sd',
        'ket_str',
        'status',
    ];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
