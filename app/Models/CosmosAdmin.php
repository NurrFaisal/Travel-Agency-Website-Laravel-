<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CosmosAdmin extends Model
{
    protected $fillable = ['admin', 'name', 'email', 'phone_number', 'password', 'status'];
}
