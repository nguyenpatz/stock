<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;
    protected $table = 'order_line';
    protected $fillable = [
        'name',
        'order_id',
        'product_id',
        'amount',
        'price',
        'total',
    ];
    public $timestamps = False;
}
