<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Candidate extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'candidates';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const SEBAGAI_SELECT = [
        'scdpm'   => 'SC DPM',
        'presbem' => 'Presiden BEM',
        'wapres'  => 'Wakil Presiden BEM',
    ];

    protected $fillable = [
        'name',
        'jurusan_id',
        'sebagai',
        'organization',
        'visimisi',
        'link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function candidateCategories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(ProdiJurusan::class, 'jurusan_id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}