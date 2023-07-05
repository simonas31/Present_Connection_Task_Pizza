<?php
namespace App\Models\Enums;

enum Topping: string {
    case Pepperoni = 'Pepperoni';
    case Cheese = 'Cheese';
    case Mushrooms = 'Mushrooms';
    case Onions = 'Onions';
    case Sausage = 'Sausage';
    case BlackOlives = 'Black Olives';
    case GreenPeppers = 'Green Peppers';
    case Pineapple = 'Pineapple';
    case Spinach = 'Spinach';

    public static function getAllValues(): array
    {
        return array_column(Topping::cases(), 'value');
    }
}