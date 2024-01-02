<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;

use App\Http\Resources\PostResource;

class ITIPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct(){
       $this->middleware("auth:sanctum")->only("store");
     }


    public function index()
    {
        //
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd(Auth::id());
        $validator = Validator::make($request->all(),[
            'title'=>'required|min:2',
            'description'=>'required',
            'img'=>'required',
            'version'=>'required',
            'content'=>'required|min:6'
        ]);
        if($validator -> fails()){
            return response($validator->errors()->all(),422);
        }
        
        $post = Post::create($request->all());

        //Authorized user saved as user_id in the posts table
        $post->user_id =Auth::id();
        $post->save();
        return (new PostResource($post))->response()->setStatusCode(200);
        }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
         //
         $validator = Validator::make($request->all(),[
            'title'=>'required|min:2',
            'description'=>'required',
            'img'=>'required',
            'version'=>'required',
            'content'=>'required|min:6'
        ]);
        if($validator -> fails()){
            return response($validator->errors()->all(),422);
        }
        $post->update($request->all());
        return new PostResource($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        // return "Deleted Successfully";
       return (new PostResource($post))->response()->setStatusCode(201);
    }
}
