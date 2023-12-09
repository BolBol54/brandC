<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHandler;
use App\Http\Requests\SizeRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::get();
        return ResponseHandler::success('All Sizes', $sizes);

    }

    public function store(SizeRequest $request)
    {
        return Size::create($request->validated());
    }

    public function show(Size $size)
    {
        return $size;
    }

    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());

        return $size;
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return response()->json();
    }
}
