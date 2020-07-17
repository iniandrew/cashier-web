<?php

namespace App\Http\Controllers;

use App\Entities\Cart;
use App\Entities\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::query()->latest()->get();

        return view('transaction.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            auth()->user()
                ->transactions()
                ->create($request->all())
                ->details()
                ->createMany(Cart::all()->map(function ($cart) {
                    return [
                        'item_id' => $cart->item_id,
                        'quantity' => $cart->quantity,
                        'subtotal' => $cart->item->price * $cart->quantity
                    ];
                })->toArray());

            DB::table('carts')->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('transaction.show', Transaction::query()->latest()->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

}
