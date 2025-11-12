<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Activite extends Model implements HasMedia
{
    //
    use InteractsWithMedia , Sluggable;
    public $incrementing = false;
    protected $fillable = [
        'libelle',
        'slug',
        'description',
        'icone',
        'position',
        'is_active',
    ];

    //Relations
    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    //Genererate ID ON CREATE
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'activites', 'length' => 10, 'prefix' =>
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
