<?php

namespace App\Http\Controllers;

use App\Entities\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::query()->doesntHave('cart')->where('stock', '>',0)->get()->sortBy('name');
        $itemCarts = Item::query()->has('cart')->get()->sortBy('cart.created_at');

        return view('home', compact('items', 'itemCarts'));
    }
}
