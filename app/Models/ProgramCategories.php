<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramCategories extends Model
{
    protected $fillable = ['user_id', 'name', 'status'];
}
