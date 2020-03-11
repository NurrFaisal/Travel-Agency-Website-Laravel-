<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabHotel extends Model
{
    protected $fillable = ['hotel_id', 'tab_id', 'package_id'];

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
