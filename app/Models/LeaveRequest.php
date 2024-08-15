<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $table = 'leave_requests';

    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'employee_name',
        'leave_type',
        'start_date',
        'end_date',
        'reason'
    ];
}
