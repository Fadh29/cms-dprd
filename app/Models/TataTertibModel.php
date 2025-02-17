<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataTertibModel extends Model
{
    use HasFactory;
    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'tata_tertib';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    protected $fillable = ['deskripsi'];
}
