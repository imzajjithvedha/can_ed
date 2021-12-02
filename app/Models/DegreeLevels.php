<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeLevels extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'orders', 'status', 'slug'];
}
