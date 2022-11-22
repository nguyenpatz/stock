<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_account extends Model
{
    use HasFactory;
    protected $table = 'bank_account';
    protected $fillable = [
        'name',
        'number_account',
    ];

    public $timestamps = false;
}
