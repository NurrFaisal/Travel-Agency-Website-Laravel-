<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirTicketDestination extends Model
{
    protected $fillable = ['name', 'air_title', 'box_image', 'background_image', 'status'];

    public function air_ticket_title(){
        return $this->belongsTo(AirTicketTitle::class, 'air_title');
    }
}
