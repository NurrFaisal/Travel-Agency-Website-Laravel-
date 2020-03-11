<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDivision extends Model
{
    protected $fillable = ['division_id', 'package_id'];

    public function division(){
        return $this->belongsTo(Division::class, 'division_id');
    }
}
