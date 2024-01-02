
@extends('Landing.nav')
@section('content')
    

{{-- <table class="table">
<tr>
    <th  scope="col">id</th>
    <th  scope="col">title</th>
    <th  scope="col">content</th>
</tr>
    <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['content']}}</td> 
    </tr>
</table>
<a href="/posts" class="btn btn-info">Show All Posts<a>
</div> --}}
<div class="container justify-content-center">
<div class="row row-cols-1 row-cols-md-2">
   <div class="col">
<img src="{{asset('images/post_images/'.$post['img'])}}"  class="float-left w-100"
 />
</div>
   <div class="col justify-content-center" >
    
      <div class="card h-100">
       {{-- @dump($cats); --}}
       {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top"
         alt="Skyscrapers" /> --}}
       <div class="card-body">
         <h5 class="card-title">{{$post['title']}}</h5>
         <h6 class="card-title">{{$post['description']}}</h6>
         <p class="card-text">
          Track:
          <a href="{{route('cats.show',$post->cat->id)}}">
         {{$post->cat->name}}
          </a>
          
         </p>
         <p class="card-text">
          Author :
      
            <a href="{{route('users.show',$post->user->id)}}">
           {{$post->user->name}}
            </a>
            {{-- @dump($post->user->name) --}}
        </p>
         <p class="card-text">
           {{$post['content']}}
         </p>
       </div>
       <div class="card-footer">
   
        <small class="text-muted ">Last updated  {{$post['updated_at']}}</small>
        <br> 
        <br>
        <a href="/posts" class="btn" style="color: antiquewhite; background-color:#1d2b64;" >Show All Posts<a>
       </div>

   </div>
   </div>
</div>
   {{-- <div class="card flex-row"><img class="card-img-left example-card-img-responsive" src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp"/>
    <div class="card-body">
      <h4 class="card-title h5 h4-sm">Left image</h4>
      <p class="card-text">Example text</p>
    </div>
  </div> --}}
@endsection 
</body>
</html>