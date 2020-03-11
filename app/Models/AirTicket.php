<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirTicket extends Model
{
    protected $fillable = ['name', 'air_ticket_title_id', 'destination', 'air_line_id', 'price', 'ticket_class', 'status'];

    public function air_ticket_title(){
        return $this->belongsTo(AirTicketTitle::class, 'air_ticket_title_id');
    }

    public function destinationR(){
        return $this->belongsTo(AirTicketDestination::class, 'destination');
    }
    public function air_line(){
        return $this->belongsTo(AirLine::class, 'air_line_id');
    }
    public function air_tickets_days(){
        return $this->hasMany(AirTicketDay::class, '', 'id');
    }
    public function air_ticket_main_destinations(){
        return $this->hasMany(AirTicketMainDestination::class, '', 'id');
    }
}
