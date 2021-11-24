<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolPrograms extends Model
{
    protected $fillable = ['user_id', 'school_id', 'degree_level', 'program_id', 'sub_title'];
}
