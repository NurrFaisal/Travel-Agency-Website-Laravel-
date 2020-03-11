<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaOrder extends Model
{
    protected $fillable = ['visa_name', 'name', 'phone_number', 'email', 'price'];
}
