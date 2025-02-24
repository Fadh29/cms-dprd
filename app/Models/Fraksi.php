<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

class Fraksi extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use HasFactory;
    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'fraksi';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    protected $fillable = ['nama'];
}
