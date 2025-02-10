<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tags extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'tags';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    // Jika primary key bukan integer (opsional)
    // public $incrementing = false;

    // Tipe data primary key (opsional)
    // protected $keyType = 'int';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name',
    ];

    // public function articles()
    // {
    //     return $this->hasMany(Articles::class, 'tags_id');
    // }

    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'article_tag');
    }


    // Kolom yang diabaikan saat serialisasi (opsional)
    // protected $hidden = [];

    // Kolom yang dikonversi ke tipe data tertentu (opsional)
    // protected $casts = [];
}
