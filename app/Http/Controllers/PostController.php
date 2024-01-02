<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
   private $posts= [
        [ "id" => "1" ,"img"=> "images.jpeg","title"=> "Laravel" , "content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essenti"],
        [ "id" => "2" , "img"=> "image3.jpg","title"=> "PHP" , "content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essenti"],
        [ "id" => "3" ,  "img"=> "download.png" ,"title"=> "JS" , "content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essenti"],
        [ "id" => "4" , "img"=> "download.jpeg","title"=> "Node.js" , "content" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essenti"],
    ];
    function postShow($id){
       
        foreach($this->posts as $post){
            if($post['id']==$id){
                return view('Posts.showPost',["post"=>$post]);
            };
        }
        return abort("404");
    }

    function postList(){

        return view('Posts.posts',['posts' => $this->posts]);
    }
    function home(){
        return view('Landing.home');
    }
    // function post($id){

    // }
}
