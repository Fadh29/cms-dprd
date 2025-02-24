<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dapil extends Model
{
    use HasFactory;

    protected $table = 'dapil';

    protected $fillable = [
        'nama',
    ];

    public $timestamps = true;

    /**
     * Relasi many-to-many dengan Kecamatan.
     */
    public function kecamatan()
    {
        return $this->belongsToMany(MstKecamatan::class, 'dapil_kecamatan', 'dapil_id', 'kecamatan_id')
            ->select('mst_kecamatan.id', 'mst_kecamatan.nama');
    }


    /**
     * Relasi many-to-many dengan Desa.
     */
    public function desa(): BelongsToMany
    {
        return $this->belongsToMany(MstDesa::class, 'dapil_desa', 'dapil_id', 'desa_id')
            ->select('mst_desa.id', 'mst_desa.nama');;
    }
}
