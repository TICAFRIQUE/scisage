<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Equipe extends Model implements HasMedia
{
    //
    use InteractsWithMedia;
    public $incrementing = false;
    protected $fillable = [
        'nom',
        'prenoms',
        'fonction',
        'description',
        'is_active',
    ];

    //GENERATE ID ON CREATE
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'equipes', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

    
    //SCOPE ACTIVE
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
