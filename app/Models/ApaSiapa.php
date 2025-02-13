<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApaSiapa extends Model
{
    use HasFactory;

    protected $table = 'apa_siapa';

    protected $fillable = [
        'tanggal_kegiatan_mulai',
    ];

    public function tamu()
    {
        return $this->hasMany(ApaSiapaTamu::class);
    }
}
