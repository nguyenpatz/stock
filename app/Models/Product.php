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
        'volume',
        'import_date',
        'export_date'
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
