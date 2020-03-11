<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirTicketDay extends Model
{
    protected $fillable = ['day_id', 'air_ticket_id'];

    public function day(){
        return $this->belongsTo(Day::class, 'day_id');
    }
}
