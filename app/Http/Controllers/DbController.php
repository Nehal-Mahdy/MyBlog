<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cat;
use Illuminate\Support\Facades\Auth;
class DbController extends Controller
{

    // function __construct(){
    //     $this->middleware('auth');
    // }

    function index(){
        // dump(Auth :: id());
        $posts=Post::paginate(4);
        
        return view('Posts.posts',['posts' => $posts]);
        }

    function show($id){
        $post= Post::findorfail($id);
        $cats= Cat::all();

        return view('Posts.showPost',["post"=>$post,"cats"=>$cats]);
        }    

    function destroy($id){
        // dd($id);

        // if(Gate:: allows("is-admin")){
            $post = Post::findorfail($id);

            if(auth()->user()->id == $post['user_id'] || auth()->user()->role=="admin"){

            $post= Post::findorfail($id);
            if($post->img){
                try{ 
                 unlink("images/post_images/{$post->img}");
               }catch (Execption $error){
                 dd($error);
               }
     
             }
    
    
    
            $post->delete();
            // $posts=Post::all();
            return to_route('blog.posts');
        }
        return abort(403);

       
    }    

    function create(){
        $cats= Cat::all();
        return view('Posts.create',['cats'=>$cats]);
        // dd("hello");
    }

    function store(){
        // dd("store");
        $data = request();
        $title= request()->get('title');
        $desc= request()->get('desc');
        $img= request()->get('img');
        $version= request()->get('version');
        $content= request()->get('content');
        $cat_id= request()->get('cat_id');


        if($data->hasFile("img")){
            $postImg= $data["img"];
            $path = $postImg->store("uploadedImages","post_images");
            $img=$path;
            
        }
        request()->validate([
            'title'=>'required|min:2',
            'desc'=>'required',
            'img'=>'required',
            'version'=>'required',
            'content'=>'required|min:6'
        ],[
            'title.required'=>"Please, Enter your post's title",
            'desc.required'=>"Please, Enter your post's Description",
            'img.required'=>"Please, Enter Image",
            'version.required'=>"Please, Enter your post's version",
            'content.required'=>"Please, Enter your post's content",
        ]);

        $post= new Post();
        $post->title=$title;
        $post->content=$content;
        $post->version=$version;
        $post->description=$desc;
        $post->img=$img;
        $post->cat_id=$cat_id;
        $post->user_id=Auth::id();
        $post->save();
        return to_route('blog.posts');
    }

    function edit($id){
        $post = Post::findorfail($id);
        // dd($post);
        return view("Posts.edit",["data"=>$post]);
    }

    function update($id){
        $post = Post::findorfail($id);

        // dd($post);
        // dd(auth()->user()->id); //2
        // dd($post['user_id']);

        if(auth()->user()->id == $post['user_id'] || auth()->user()->role=="admin"){
            // dd("current user");
            $post = Post::findorfail($id);
            // $data = request();
            $title= request()->get('title');
            $desc= request()->get('desc');
            $img= request()->get('img');
            $version= request()->get('version');
            $content= request()->get('content');
    
            $data = request();
            
            if($data->hasFile("img")){
                $postImg= $data["img"];
                $path = $postImg->store("uploadedImages","post_images");
                $img=$path;
                
            }
            // $post= new Post();
            $post->title=$title;
            $post->content=$content;
            $post->version=$version;
            $post->description=$desc;
            $post->img=$img;
            
            
       
    
            request()->validate([
                'title'=>'required|min:2',
                'desc'=>'required',
                'img'=>'required',
                'version'=>'required',
                'content'=>'required|min:6'
            ],[
                'title.required'=>"Please, Enter your post's title",
                'desc.required'=>"Please, Enter your post's Description",
                'img.required'=>"Please, Enter Image",
                'version.required'=>"Please, Enter your post's version",
                'content.required'=>"Please, Enter your post's content",
            ]);
            $post->update();
            return to_route('blog.posts');



        };

        abort(403);

       
    }
}
