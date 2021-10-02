<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineBusinessDirectory extends Model
{
    protected $table = 'online_business_directory';

    protected $fillable = ['user_id', 'name', 'address', 'city', 'province', 'postal_code', 'phone', 'fax', 'industry', 'status'];
}
