<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
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
        
        
        return Redirect::route('cart.index')->with('success', 'Produkt dodany do koszyka.');
    }
    public function index()
{
    $products = Product::all();

    return view('admin.products.index', compact('products'));
}

    public function create(Request $request)
{
 
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
     
    ]);

    
    $product = new Product();
    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];
    
    $product->save();

   
    return back()->with('success', 'Produkt został dodany pomyślnie.');
}
public function destroy($id)
{
    $product = Product::findOrFail($id); 

  
    $product->delete();

    return back()->with('success', 'Produkt został usunięty pomyślnie.');
}

}
