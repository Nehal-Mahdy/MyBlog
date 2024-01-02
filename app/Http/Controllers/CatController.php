<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatController;
use App\Http\Requests\UpdateCatRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cats = Cat::all();
        return view('Cats.index',['cats'=>$cats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("Cats.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatController $request)
    {
        //
        // dd($request);

        // request()->validate([
        //     "name"=>"required",
        //     "img"=>"required"
        // ]);

        // dd($request->all());
        $data= $request->all();
        if($request->hasFile("img")){
            $catImg= $data["img"];
            $path = $catImg -> store("uploadedImages","cat_images");
            // dd($path);
            $data["img"]=$path;
        }
        // dd($request['img']);
        // dd($data["img"]);
        Cat::create($data);

        return to_route("cats.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //
        return view("Cats.show",["cat"=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        //
        // dd($cat);
        return view("Cats.edit",['cat'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatRequest $request, Cat $cat)
    {
        //
        $allowedUser = Gate::inspect("update", $cat);

        if($allowedUser -> allowed()){
            
        $data= $request->all();
        if($request->hasFile("img")){
            $catImg= $data["img"];
            $path = $catImg -> store("uploadedImages","cat_images");
            // dd($path);
            $data["img"]=$path;
        }
        // dd($request->img);
        $cat->update($data);
        return to_route("cats.index");
        }

        return abort(403);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //
        if($cat->img){
           try{ 
            unlink("images/cat_images/{$cat->img}");
          }catch (Execption $error){
            dd($error);
          }

        }
        // dd($cat->img);
        $cat->delete();
        return to_route("cats.index");

    }
}
