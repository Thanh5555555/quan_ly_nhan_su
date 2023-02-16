<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory,SoftDeletes;
    protected $filable = [
        'price',
        'type',
        'content',
        'employee_id',
        ];
        public function employee(){
            return $this->belongsTo(Employee::class);
        }
}
