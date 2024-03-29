<?php

namespace App\Http\Controllers\api;

use App\Models\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CatResource;
class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cats = Cat::all();
        return CatResource::collection($cats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
