<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    use HasFactory;
    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'tupoksi';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    protected $fillable = ['deskripsi'];
}
