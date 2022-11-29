<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'product_category';
    protected $fillable = [
        'name',
        'warehouse_id',
    ];

    public $timestamps = false;
}
