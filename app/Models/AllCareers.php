<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllCareers extends Model
{
    protected $fillable = ['user_id', 'level', 'hierarchical', 'code', 'title', 'definition', 'status'];
}
