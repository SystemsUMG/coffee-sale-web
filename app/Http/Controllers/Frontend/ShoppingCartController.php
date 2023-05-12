<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('frontend.pages.shopping-cart.shopping-cart');
    }

    public function pay()
    {
        $user = auth()->user();
        return view('frontend.pages.shopping-cart.pay', [
            'user' => $user
        ]);
    }
}
