<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id', 'emp_id', 'epm_name', 'ip_address'
    ];
}
