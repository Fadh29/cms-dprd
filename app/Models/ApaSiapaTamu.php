<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApaSiapaTamu extends Model
{
    use HasFactory;

    protected $table = 'apa_siapa_tamu';

    protected $fillable = [
        'apa_siapa_id',
        'badan',
        'agenda',
        'akd_terkait',
        'bagian_terkait',
        'jam_mulai',
        'jam_selesai',
        'tanggal_tamu_mulai',
        'tanggal_tamu_selesai',
    ];

    public function apaSiapa()
    {
        return $this->belongsTo(ApaSiapa::class);
    }
}
