<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory; //HasFactory is a trait that allows a model to use model factories for testing and seeding data
    protected $fillable = [
        'employee_id',
        'date',
        'check_in',
        'check_out',
    ];

    //add relationship to Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class); //'employee_id' is the foreign key in the attendances table that references the employees table
    }

    public function getHoursWorkedAttribute()
    {
    if (!$this->check_in || !$this->check_out) { //if not check_in or not check_out this will return null
        return 0;
    }

    return \Carbon\Carbon::parse($this->check_out) //Turn check-out into time objects, find the difference in minutes, then convert it to hours
        ->diffInMinutes(\Carbon\Carbon::parse($this->check_in)) / 60; //carbon is a date-time library for PHP that handle dates & times, avoid manual time math, and prevent common bugs
    }                                                                             //example: check_in at 9:00 and check_out at 17:30 will return 8.5 hours worked
}