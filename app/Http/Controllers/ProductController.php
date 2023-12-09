<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHandler;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        return $request->colors;
       $product = Product::create($request->only([
           'name',
           'factoryPrice',
           'pricePerUnit'
       ]));
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $product->images()->create([
                    'image' => $image->store('media', 'public')
                ]);
            }
        }
       if ($request->has('colors')) {
           $product->items()->attach($request->colors);
       }
       if ($request->has('sizes')) {
           $product->items()->attach($request->sizes);
       }
       return ResponseHandler::success('Product Created', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
