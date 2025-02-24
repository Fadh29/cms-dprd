<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MstDesa extends Model
{
    use HasFactory;

    protected $table = 'mst_desa'; // Nama tabel

    protected $fillable = [
        'id_kecamatan',
        'nama',
        'latitude',
        'longitude',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public $timestamps = true;

    /**
     * Relasi ke tabel MstKecamatan (satu desa milik satu kecamatan)
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(MstKecamatan::class, 'id_kecamatan', 'id');
    }

    public function dapil(): BelongsToMany
    {
        return $this->belongsToMany(Dapil::class, 'dapil_desa', 'desa_id', 'dapil_id');
    }
}
