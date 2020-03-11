<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTab extends Model
{
    protected $fillable = ['name', 'package_id', 'itinerary_title', 'tab_note', 'special_note'];

    public function hotels(){
        return $this->hasMany(TabHotel::Class, 'tab_id');
    }
    public function tabItineraryTitles(){
        return $this->hasMany(TabItineraryTitle::class, 'tab_id');
    }
    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }
}
