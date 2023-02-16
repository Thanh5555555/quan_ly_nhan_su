<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /*
     * Male
     */
    const MALE = 1;

    /*
     * Female
     */
    const FEMALE = 2;


    protected $filable = [
        'name',
        'email',
        'address',
        'phone',
        'gender',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

   /**
     * Get gender
     *
     * @return array
     */
    public static function getGender()
    {
        return [
            self::MALE => 'Nam',
            self::FEMALE => 'Nữ'
        ];
    }


    /**
     * Get gender object
     *
     * @return string
     */
    public function getGenderObjectAttribute()
    {
        return [
            'id' => $this->gender,
            'name' => self::getGender()[$this->gender]
        ];
    }
}
