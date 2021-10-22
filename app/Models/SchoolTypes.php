<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolTypes extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'status'];
}
