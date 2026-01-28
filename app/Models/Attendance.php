<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

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
}


