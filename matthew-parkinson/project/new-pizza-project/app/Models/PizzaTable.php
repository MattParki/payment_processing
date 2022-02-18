<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'thin',
        'thick',
        'pepperoni',
        'basil',
        'black_olives',
        'oregano',
        'tomatoes',
        'mozzarella',
        'feta_cheese',
        'cheddar',
        'provolone',
        'olive_oil',
        'spicy_oil',
        'red_onion',
        'size',
        'crust',
        'oil',
        'dough',
        'server_name',
        'your_name',
    ];
}
