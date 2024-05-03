<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class , 'department_id' , 'department_id');
    }


    public function manager()
    {
        return $this->belongsTo(Employee::class ,'manager_id','employee_id')->withDefault('last_name','No manager');
    }
















}
