<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

class Galeri extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'galeri';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    // Jika primary key bukan integer (opsional)
    // public $incrementing = false;

    // Tipe data primary key (opsional)
    // protected $keyType = 'int';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'status_foto',
        'url',
        'tags',
        // 'tags_id',
        // 'file',
        'tanggal_unggah',
        'tanggal_publish_mulai',
        'tanggal_publis_selesai',
        'status_file',
        'status_tampil',
    ];

    // public function tags()
    // {
    //     return $this->belongsTo(Tags::class, 'tags_id');
    // }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
        });
    }

    // public function isKhusus()
    // {
    //     return $this->kategori === 'khusus';
    // }
    // public function files()
    // {
    //     return $this->hasMany(ArticleFile::class);
    // }
    // Kolom yang diabaikan saat serialisasi (opsional)
    // protected $hidden = [];

    // Kolom yang dikonversi ke tipe data tertentu (opsional)
    // protected $casts = [];
}
