<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name',
        'amount',
        'template_id',
        'note',
        'state',
        'height',
        'length',
        'width',
        'weight',
        'color',
        'price',
        'price_cost'
    ];
    public $timestamps = False;
}
