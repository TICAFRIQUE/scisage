<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Engagement extends Model implements HasMedia
{
    //

    use InteractsWithMedia;
    public $incrementing = false;
    protected $fillable = [
        'libelle',
        'icone',
        'description',
        'position',
        'is_active',

    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'engagements', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }


    //SCOPE ACTIVE
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    //SCOPE ORDERED
    public function scopeOrdre($query)
    {
        return $query->orderBy('position', 'asc');
    }
}
