<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'star', 'category', 'web_site','country', 'division', 'address', 'price', 'facilities', 'note', 'discount', 'box_image', 'status'];

    public function countryf(){
        return $this->belongsTo(Country::class, 'country');
    }
    public function divisionf(){
        return $this->belongsTo(Division::class, 'division');
    }

}
