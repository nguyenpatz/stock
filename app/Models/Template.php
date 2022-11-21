<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'template';
    protected $fillable = [
        'name',
        'amount',
        'category_id',
        'date_manufacture',
        'expiry_date',
        'note',
        'state'
    ];
    public $timestamps = False;
    protected $defaults = array(
        'amount' => 0,
        'state' => 'New'
    );
    
    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }
}
