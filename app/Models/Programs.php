<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $fillable = ['user_id', 'degree_level', 'name', 'description', 'status'];
}
