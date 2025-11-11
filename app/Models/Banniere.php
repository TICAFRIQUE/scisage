<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Banniere extends Model implements HasMedia
{
    //
    use \Spatie\MediaLibrary\InteractsWithMedia;

    public $incrementing = false;

    protected $table = 'bannieres';
    protected $fillable = [
        'is_active'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'bannieres', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }


    //SCOPE ACTIVE
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
