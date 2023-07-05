<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\PizzaTopping;
use App\DTO\OrdersDTO;

class OrdersController extends Controller
{
    /**
     * Display a pizza order form(main page).
     */
    public function index()
    {
        return view('home');
    }

    /*
     * Display user pizza orders
    */
    public function orders(){
        $pizzas = Pizza::all();
        $orders = [];
        $total = 0.0;

        foreach($pizzas as &$pizza){
            $orderToppings = [];
            $orderDTO = new OrdersDTO;

            $orderDTO->Id = $pizza->Id;
            $orderDTO->PizzaSize = $pizza->Size;
            $orderDTO->PizzaPrice = $pizza->Price;

            $toppings = PizzaTopping::where('fk_PizzaId', '=', $orderDTO->Id)->get();
            foreach ($toppings as $topping) {
                array_push($orderToppings, $topping->ToppingName);
            }

            $total += $orderDTO->PizzaPrice;
            $orderDTO->Toppings = $orderToppings;
            array_push($orders, $orderDTO);
        }
        
        return response()->json(['orders' => $orders, 'total' => round($total, 2)]);  
    }
    /**
     * Store a newly created pizza in storage.
     */
    public function store(Request $request)
    {
        $size = $request->input('size');
        $toppings = $request->input('toppings');
        $pizza = new Pizza;
        $price = 0.0;
        $discount = false;

        if($size == "Small"){
            $price = 8.0;
        }else if($size == "Medium"){
            $price = 10.0;
        }else{
            $price = 12.0;
        }

        //each topping is 1eur
        $toppingsPrice = 0;
        if($toppings != null){
            $toppingsPrice = count($toppings);
        }

        //add toppings price to total price
        $pizza->size = $size;
        if($toppingsPrice > 3)
            $pizza->price = ($price+$toppingsPrice)*0.9;
        else
            $pizza->price = $price+$toppingsPrice;

        $pizza->save();

        if($toppings != null){
            $lastInserted = $pizza->Id;
            foreach ($toppings as &$toppingName) {
                PizzaTopping::create(['ToppingName' => $toppingName, 'fk_PizzaId' => $lastInserted]);
            }
        }

        return response()->json([$request->all()]);  
    }
}
