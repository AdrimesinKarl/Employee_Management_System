<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [ //fillable fields for mass assignment
        'first_name',
        'last_name',
        'email',
        'position',
        'hourly_rate'
    ];
}
