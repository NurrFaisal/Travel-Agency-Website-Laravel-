<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = ['continent_id', 'country_name', 'price', 'short_description', 'duration', 'professional', 'business', 'spouse', 'student', 'embassy', 'terms_and_condition', 'box_image', 'banner_image', 'status'];

    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }
}
