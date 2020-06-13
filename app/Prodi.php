<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Prodi extends Model
{
    use SoftDeletes, Notifiable, Auditable;

    public $table = 'prodis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'jumlah_mahasiswa',
        'jurusan_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jurusan()
    {
        return $this->belongsTo(ProdiJurusan::class, 'jurusan_id');
    }
}
