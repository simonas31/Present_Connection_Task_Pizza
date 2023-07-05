<?php

namespace App\DTO;

class OrdersDTO
{
    public int $Id;
    public string $PizzaSize;
    public float $PizzaPrice;
    public array $Toppings;
    public float $TotalPrice;
}
