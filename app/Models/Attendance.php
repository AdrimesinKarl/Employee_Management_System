<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'time_in',
        'time_out',
    ];

    // Convert database strings into PHP date/time objects automatically
    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    protected function timeIn(): Attribute
    {
    return Attribute::make(
        get: fn($value) => $value ? Carbon::createFromFormat('H:i:s', $value) : null,
        set: fn($value) => $value,
    );
    }

    // Convert time_out to Carbon instance for easier manipulation
    protected function timeOut(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::createFromFormat('H:i:s', $value) : null,
            set: fn($value) => $value,
        );
    }
    
    //calculate hours worked for this specific day
    protected function hoursWorked(): Attribute
{
    return Attribute::make(
        get: function () {
            if (!$this->time_in || !$this->time_out) {
                return '0h 0m';
            }

            $minutes = $this->time_in->diffInMinutes($this->time_out);

            return floor($minutes / 60) . 'h ' . ($minutes % 60) . 'm';
        }
    );
}
    
    // Get the employee who owns this record
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}

