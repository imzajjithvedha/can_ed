<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolScholarships extends Model
{
    protected $fillable = ['user_id', 'school_id', 'name', 'summary', 'eligibility', 'province', 'award', 'action', 'duration', 'deadline', 'availability', 'level_of_study', 'link', 'more_info', 'provider', 'amount', 'date_posted', 'expiry_date',];
}
