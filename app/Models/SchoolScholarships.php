<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolScholarships extends Model
{
    protected $fillable = ['user_id', 'school_id', 'name', 'summary', 'eligibility', 'award', 'action', 'deadline', 'availability', 'level_of_study', 'link'];
}
