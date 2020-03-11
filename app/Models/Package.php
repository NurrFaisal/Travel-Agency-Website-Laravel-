<?php

namespace App\Models;

use App\Events\package\PackageCreated;
use App\Events\package\PackageDeleted;
use App\Events\package\PackageUpdated;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable =[ 'category_id', 'country_id', 'division_id', 'code', 'name', 'location', 'duration', 'price', 'short_description', 'long_description', 'includes', 'excludes', 'fixed_date', 'destination_location','tour_details', 'important_note', 'terms_and_condition', 'box_image', 'banner_image', 'status' ];

    protected $dispatchesEvents = [
        'saved' => PackageCreated::class,
        'updated' => PackageUpdated::class,
        'deleted' => PackageDeleted::class,
    ];

    public function category(){
        return $this->belongsTo(PackList::class, 'category_id');
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function division(){
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function images(){
        return $this->hasMany(PackageGellery::class,'', 'id');
    }

    public function tourDays(){
        return $this->hasMany(TourDay::class, '', 'id');
    }
    public function packageTabs(){
        return $this->hasMany(PackageTab::class, 'package_id');
    }
    public function packageCountries(){
        return $this->hasMany(PackageCountry::class, 'package_id' );
    }
    public function packageDivisions(){
        return $this->hasMany(PackageDivision::class, 'package_id' );
    }

}
