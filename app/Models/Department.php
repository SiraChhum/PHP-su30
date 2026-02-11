<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
// Tell Laravel the primary key name is not 'id'
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_code',
        'department_name',
        'description',
        'status',
    ];
}