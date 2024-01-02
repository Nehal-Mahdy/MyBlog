@extends('Landing.nav')
@section('content')
    
<div class="container justify-content-center">
<div class="row row-cols-1 row-cols-md-2">
   <div class="col">
<img src="{{asset('images/cat_images/'.$cat['img'])}}"  class="float-left w-100"
 />
</div>
   <div class="col justify-content-center" >
    
      <div class="card h-100">
       
       {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top"
         alt="Skyscrapers" /> --}}
       <div class="card-body">
         <h5 class="card-title">{{$cat['name']}}</h5>
         {{-- <h6 class="card-title">{{$post['description']}}</h6> --}}
         <p class="card-text">
           {{-- {{$post['content']}} --}}

           <ul>
            @foreach($cat->posts as $post)
            <li>
              <a href="{{route('post.show',$post->id)}}">
              {{$post['title']}}
              </a>
            </li>
            @endforeach
           </ul>
         </p>
       </div>
       <div class="card-footer">
   
        <small class="text-muted ">Last updated  {{$cat['updated_at']}}</small>
        <br> 
        <br>
        <a href="/cats" class="btn" style="color: antiquewhite; background-color:#1d2b64;" >Show All Categories<a>
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