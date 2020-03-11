<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['continent_id','name', 'slug', 'capital', 'languages', 'area', 'population', 'currency', 'time_zone', 'calling_code', 'date_formate', 'independent', 'victory', 'religion', 'image', 'banner_image', 'status'];

    public function continent(){
        return $this->belongsTo(Continent::class, 'continent_id');
    }
}
