<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.category.create');
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
            $category = Categories::create([
                "name"   => $request->name,
                "image"  => $image_name
            ]);

            if ($category) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Category has been succesfully created.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            // return $request;
            $image      = $request->file('image');
            $image_name = date('Ymdhms.') . $image->getClientOriginalExtension();
            $category = Categories::create([
                "name"   => $request->name,
                "image"  => $image_name
            ]);

            if ($category) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Category has been succesfully created.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data = Categories::findOrFail($id);
          return view('admin.pages.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // return $request;
            $image      = $request->file('image');
            $image_name = date('Ymdhms.') . $image->getClientOriginalExtension();
            $category = Categories::findOrFail($id)->update([
                "name"   => $request->name,
                "image"  => $image_name
            ]);

            if ($category) $image->storeAs('public/image',$image_name);

            return response()->json([
                'success' => true,
                'message' => 'Category has been succesfully Updated.'
            ]);

        }catch (Exception $e) {
            return response()->json(['unable' => $e]);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        //
    }
}
