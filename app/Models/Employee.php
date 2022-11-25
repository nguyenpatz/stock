<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
/*
protected $table = "warehouse";
    protected $fillable = [
        'name',
        'type',
    ];

    public $timestamps = false;
 */
    protected $table = "employee";
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
    ];

    public $timestamps = false;

    

}
