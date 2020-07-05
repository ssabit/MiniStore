<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id', 'salary_month', 'paid_amount',
    ];
}
