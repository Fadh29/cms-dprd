<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'agenda';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    protected $fillable = ['tanggal_kegiatan'];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
