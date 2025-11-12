<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Faq extends Model
{
    //
    public $incrementing = false;
    protected $fillable = [
        'question',
        'reponse',
        'position',
        'is_active',
    ];

    //GENERATE ID ON CREATE
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'faqs', 'length' => 10, 'prefix' =>
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
