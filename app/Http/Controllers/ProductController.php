<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Str;
use Stringable;

class ProductController extends Controller
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
        return view('products.create'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        if ($request->get('inventory')) {
            $this->validate($request, [
                'inventory' => 'numeric',
            ]);
        }
        $product = new Product([
            'sku' => $request->get('sku'),
            'name' => $request->get('name'),
            'slug' => String::slug($request->get('name')),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'inventory' => $request->get('inventory'),
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Product has been saved!');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
