<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['country_id', 'name', 'slug', 'box_image', 'background_image', 'status' ];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}
