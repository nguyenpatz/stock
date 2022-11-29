<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'name',
        'partner_id',
        'create_date',
        'expiration_date',
        'received_date',
        'employee_id',
        'pricelist_id',
        'payment_term',
        'state',
    ];
    public $timestamps = False;
    protected $defaults = array(
        'state' => 'New'
    );

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }
}
