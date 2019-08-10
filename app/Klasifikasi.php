<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';
    protected $fillable = [
        'tipe_klasifikasi'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
