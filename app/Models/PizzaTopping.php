<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaTopping extends Model
{
    use HasFactory;
    protected $table = 'pizza_toppings';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Id', 'ToppingName', 'fk_PizzaId'];
}
