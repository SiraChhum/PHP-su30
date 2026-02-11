<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey = 'position_id';

    protected $fillable = [
        'position_title',
        'description',
        'level',
        'department_id',
        'is_managerial',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
