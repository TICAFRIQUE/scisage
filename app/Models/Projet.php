<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Projet extends Model implements HasMedia
{
    //
    use InteractsWithMedia, Sluggable;
    public $incrementing = false;
    protected $fillable = [
        'etape',
        'libelle',
        'slug',
        'description',
        'activite_id',
        'is_active',
    ];


    //Relations un projet appartient a une activite
    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }


    //ID GENERATOR ON CREATE
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'projets', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

    //Slug function
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'libelle'
            ]
        ];
    }

    //SCOPE ACTIVE
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
