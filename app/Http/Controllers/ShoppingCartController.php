<?php

namespace App\Http\Controllers;

use App\Models\Shopping_cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('shopping.shopping-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping_cart $shopping_cart)
    {
        //
    }
}
