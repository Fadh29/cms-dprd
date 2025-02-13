<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Articles extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'articles';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    // Jika primary key bukan integer (opsional)
    // public $incrementing = false;

    // Tipe data primary key (opsional)
    // protected $keyType = 'int';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'title',
        'content',
        'author',
        // 'tags_id',
        // 'file',
        'summary',
        'caption',
        'fotografer',
        'status_articles',
        'tags',
    ];

    // public function tags()
    // {
    //     return $this->belongsTo(Tags::class, 'tags_id');
    // }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'article_tag');
    }
    // public function files()
    // {
    //     return $this->hasMany(ArticleFile::class);
    // }
    // Kolom yang diabaikan saat serialisasi (opsional)
    // protected $hidden = [];

    // Kolom yang dikonversi ke tipe data tertentu (opsional)
    // protected $casts = [];
}
