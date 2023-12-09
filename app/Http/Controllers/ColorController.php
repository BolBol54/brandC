<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHandler;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $colors = Color::get();
        return ResponseHandler::success('All Colors', $colors);
    }
}
