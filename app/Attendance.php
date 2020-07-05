<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //protected $table='attendance';
    protected $fillable = [
        'user_id', 'att_date', 'att_year','attendance','edit_date','month'
    ];
}
