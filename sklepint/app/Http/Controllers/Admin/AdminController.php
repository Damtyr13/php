<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function dashboard()
    {

        
        $products = Product::all();

        return view('admin.dashboard', ['products' => $products]);
    }
}
