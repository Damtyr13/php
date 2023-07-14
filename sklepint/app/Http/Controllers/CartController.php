<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
      
        $user = auth()->user();
        $cartItems = $user->cartItems()->with('product')->get();
        
 
        return view('cart.index', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        
        $product = Product::findOrFail($request->input('product_id'));


        $user = auth()->user();
        $cart = $user->cart;

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = 1;
        $cartItem->save();

       

        return redirect()->route('cart.index')->with('success', 'Produkt dodany do koszyka.');
    }
    public function removeFromCart($id)
{
    $cartItem = CartItem::findOrFail($id);
    $cartItem->delete();

    return redirect()->route('cart.index')->with('success', 'Przedmiot został usunięty z koszyka.');
}

}
