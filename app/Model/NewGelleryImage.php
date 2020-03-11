<?php

namespace App\Model;

use App\Models\GelleryMainCategory;
use App\Models\OurTeamStaff;
use Illuminate\Database\Eloquent\Model;

class NewGelleryImage extends Model
{
    protected $fillable = ['year_id', 'gellery_main_category_id', 'sub_category_id', 'person_id', 'box_image'];

    public function main_category(){
        return $this->belongsTo(GelleryMainCategory::class, 'gellery_main_category_id');
    }
    public function person(){
        return $this->belongsTo(OurTeamStaff::class, 'person_id');
    }
}
