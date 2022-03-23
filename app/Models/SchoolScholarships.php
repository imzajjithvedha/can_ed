<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolScholarships extends Model
{
    protected $fillable = ['user_id', 'school_id', 'school_name', 'province', 'name', 'award', 'summary', 'amount', 'eligibility', 'action', 'date_posted', 'expiry_date', 'deadline', 'availability',  'level_of_study', 'duration', 'more_info', 'link'];
}
