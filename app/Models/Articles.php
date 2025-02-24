<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
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
        'slug',
        'text',
        'content',
        'author',
        // 'tags_id',
        // 'file',
        'summary',
        'caption',
        'fotografer',
        'status_articles',
        'tags',
        'tgl_publish',
        'kategori',
        'super_article',
        'spesial_kategori',
    ];

    // public function tags()
    // {
    //     return $this->belongsTo(Tags::class, 'tags_id');
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tags::class, 'article_tag');
    // }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public');
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
