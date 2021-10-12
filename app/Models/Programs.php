<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $fillable = ['user_id', 'program_category', 'name', 'description', 'status'];
}
