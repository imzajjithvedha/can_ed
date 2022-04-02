<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category_1',
        'category_2',
        'category_3',
        'description',
        'contact_name',
        'email',
        'phone',
        'address',
        'image',
        'facebook',
        'twitter',
        'you_tube',
        'you_tube',
        'package',
        'url',
        'status',
        'featured',
        'student_service',
        'advertised',
    ];
}
