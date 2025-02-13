<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;
    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'kegiatan';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    protected $fillable = ['agenda_id', 'waktu_kegiatan', 'judul_kegiatan', 'deskripsi_kegiatan'];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
