<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHandler;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

       return ResponseHandler::success('Categories Fetched', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories,name,except,id',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $category = new Category;

        $category->name = $request->input('name');

        $category->description = $request->input('description');

        $category->image = $request->file('image')->store('media', 'public');

        $category->save();


        $categories = Category::get();
        return ResponseHandler::success('Category Created', $categories);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $category = Category::find($id);
        return ResponseHandler::success('Category Fetched',new CategoryResource($category));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->file('image'))
        {
            $request->file('image')->store('media', 'public');
        }
        $category->update($request->all());
        return ResponseHandler::success('Category Updated', new CategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
