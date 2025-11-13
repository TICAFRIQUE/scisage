<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Portfolio extends Model implements HasMedia
{
    //
     use InteractsWithMedia, Sluggable;

     public $incrementing = false;
    //
    protected $fillable = [
        'libelle', // title of the portfolio item
        'slug',
        'categorie', // realisations, projets, conceptions
        'type', // ex: villa, appartement, bureau, etc.
        'localisation', // location of the portfolio item
        'caracteristique', // ex: 3 chambres, 2 salles de bain, etc.
        'prix', // price of the portfolio item
        'is_active' // status of the portfolio item
    ];



    //ID GENERERATED
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'portfolios', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

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
