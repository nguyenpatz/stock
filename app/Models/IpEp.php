<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpEp extends Model
{
    protected $table = 'import__export';
    protected $fillable = [
        'name',
        'partner_id',
        'order_id',
        'delivery_address',
        'received_date',
        'delivery_date',
        'status',
    ];
    public $timestamps = False;
}
