<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private array $cart;
    
    public __construct()
    {
        $this->cart = session()->get('cart', []);
    }
    public function index()
    {
        $cart = $this->cart;
        return view('cart',compact('cart'));
    }
    
}
