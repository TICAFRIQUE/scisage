<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Actualite extends Model implements HasMedia
{
    //
    use InteractsWithMedia, Sluggable;
    protected $fillable = [
        'libelle',
        'slug',
        'description',
        'position',
        'is_active',
    ];

    //ID GENERATED CODE HERE
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'actualites', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

    //SLUG FUNCTION

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'libelle'
            ]
        ];
    }

    //SCOPE FOR ACTIVE RECORDS
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    //SCOPE POSITION ORDERING
    public function scopePositionOrder($query)
    {
        return $query->orderBy('position', 'asc');
    }
}
