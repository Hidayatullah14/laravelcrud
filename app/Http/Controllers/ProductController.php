<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Str;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::paginate(10);
		
		return view('products.index', compact('products'));
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
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
			'slug' => str::slug($request->get('name')),
			'description' => $request->get('description'),
			'price' => $request->get('price'),
			'inventory' => $request->get('inventory'),
		]);

		$product->save();

		return redirect('/products')->with('success', 'Product has been saved!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
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
		$product = Product::findOrFail($id);
		
		return view('products.edit', compact('product'));
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
		$request->validate([
			'sku' => 'required|unique:products,sku,'. $id,
			'name' => 'required',
			'price' => 'required|numeric',
		]);

		if ($request->get('inventory')) {
			$this->validate($request, [
				'inventory' => 'numeric',
			]);
		}
		
		$product = Product::findOrFail($id);

		$product->update([
			'sku' => $request->get('sku'),
			'name' => $request->get('name'),
			'slug' => String::slug($request->get('name')),
			'description' => $request->get('description'),
			'price' => $request->get('price'),
			'inventory' => $request->get('inventory'),
		]);

		return redirect('/products')->with('success', 'Product has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);

		$product->delete();

		return redirect('/products')->with('success', 'Product has been deleted!');
	}
}