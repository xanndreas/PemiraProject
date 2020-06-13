<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdiJurusan extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'prodi_jurusans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'total_mahasiswa',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jurusanProdis()
    {
        return $this->hasMany(Prodi::class, 'jurusan_id', 'id');
    }

    public function jurusanCandidates()
    {
        return $this->hasMany(Candidate::class, 'jurusan_id', 'id');
    }
}
