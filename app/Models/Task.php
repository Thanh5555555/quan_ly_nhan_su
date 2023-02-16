<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
    protected $filable = [
        'name',
        'employee_id',
        'content',
        'status',
        'daywork',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
