<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $user = Auth::user(); 
        $cartItems = $user->cartItems; 
        $totalCost = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });


        $order = new Order();
        $order->name = $data['name'];
        $order->email = $data['email'];
        $order->address = $data['address'];
        $order->total_cost = $totalCost;
        $order->save();

        foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;
            $price = $product->price; 
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product->id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $price; 
            $orderItem->save();
        }

     
        return redirect()->route('cart.index')->with('success', 'Zamówienie zostało złożone! Numer zamówienia: ' . $order->id);
    }

    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }
}
