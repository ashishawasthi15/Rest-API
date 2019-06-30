<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeHistory extends Model
{
    protected $fillable = [
        'ip_address', 'url', 'date'
    ];

}
