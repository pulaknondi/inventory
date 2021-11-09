<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        try {
            // return $request;
            $image      = $request->file('image');
            $image_name = date('Ymdhms.') . $image->getClientOriginalExtension();
            $brand = Brand::create([
                "name"   => $request->name,
                "image"  => $image_name
            ]);

            if ($brand) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Brand has been succesfully created.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }    
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        return view('admin.pages.brand.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // return $request;
            $image      = $request->file('image');
            $image_name = date('Ymdhms.') . $image->getClientOriginalExtension();
            $brand = Brand::findOrFail($id)->update([
                "name"   => $request->name,
                "image"  => $image_name
            ]);

            if ($brand) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Brand has been succesfully Updated.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        //
    }
}
