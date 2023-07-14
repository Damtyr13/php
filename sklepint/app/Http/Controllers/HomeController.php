<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Musisz się zalogować, aby zobaczyć tę stronę.');
        }
        if (auth()->user()->isAdmin()) {
            
            return view('admin.dashboard');
        } else {
         
            $products = Product::all();
            return view('user.dashboard', compact('products'));
        }
    }
}
