<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCountry extends Model
{
    protected $fillable = ['country_id', 'package_id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }
}
