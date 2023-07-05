<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Id', 'Size', 'Price'];
}
