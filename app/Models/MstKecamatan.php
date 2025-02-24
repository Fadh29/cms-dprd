<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MstKecamatan extends Model
{
    use HasFactory;

    protected $table = 'mst_kecamatan'; // Nama tabel

    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true;

    /**
     * Relasi ke tabel MstDesa (satu kecamatan memiliki banyak desa)
     */
    public function desa(): HasMany
    {
        return $this->hasMany(MstDesa::class, 'id_kecamatan', 'id');
    }

    public function dapil(): BelongsToMany
    {
        return $this->belongsToMany(Dapil::class, 'dapil_kecamatan', 'kecamatan_id', 'dapil_id');
    }
}
