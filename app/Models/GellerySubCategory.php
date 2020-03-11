<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GellerySubCategory extends Model
{
    protected $fillable = ['name', 'slug', 'box_image', 'background_image', 'status', 'gellery_main_category_id'];

    public function mainCategory(){
        return $this->belongsTo(GelleryMainCategory::class, 'gellery_main_category_id');
    }
}
