<?php

namespace App\Http\Controllers;

use App\Models\purchases;
use App\Models\product;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all(); 
        
        return view('admin.pages.purchases.create',compact('products'));
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
     * @param  \App\Models\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function show(purchases $purchases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function edit(purchases $purchases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchases $purchases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchases $purchases)
    {
        //
    }
}
