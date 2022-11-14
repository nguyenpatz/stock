<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $fillable = [
        'name',
        'partner_id',
        'order_id',
        'create_date',
        'date_payment',
        'payment_term',
        'total_payment',
        'debt',
        'state'
    ];   
    public $timestamps = False;
    protected $defaults = array(
        'state' => 'New',
    );
    
    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }
}