<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\brand;
use App\Models\categories;
use App\Models\unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products   = Product::all();
       return view('admin.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products   = Product::all();
        $brands     = Brand::all();
        $categories = Categories::all();
        $units = Unit::all();
        return view('admin.pages.product.create',compact('products','brands','categories','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // return $request;
            $image      = $request->file('image');
            $image_name = date('Ymdhms.') . $image->getClientOriginalExtension();
            $product = Product::create([
                "name"      => $request->name,
                "code"      => $request->code,
                "type"      => $request->type,
                "brand_id"     => $request->brand,
                "category_id"  => $request->category,
                "unit_id"    => $request->unit,
                "cost"      => $request->cost,
                "price"     => $request->price,
                "qty"       => $request->quantity,
                "alert_quantity"    => $request->alrt_qty,
                "image"        => $image_name,
                "featured"     => $request->feature,
                "product_details"  => $request->description,
            ]);

            if ($product) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Product has been succesfully created.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
