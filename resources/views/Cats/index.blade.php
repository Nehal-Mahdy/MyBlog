@extends('Landing.nav')
@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4">
 @foreach ($cats as $cat)
<div class="col" >
 
   <div class="card h-100">
    
    <img src="{{asset('images/cat_images/'.$cat['img'])}}" class="card-img-top"
      alt="Skyscrapers" />
    <div class="card-body">
      <h5 class="card-title">{{$cat['name']}}</h5>
      {{-- <h6 class="card-title">{{$post['description']}}</h6> --}}
      <p class="card-text">
        {{-- {{$post['title']}} --}}
        {{-- {{ Str::limit($post['content'], 20) }} <br>--}}
        <a class ="" href="{{route('cats.show',$cat)}}">Details</a> 
      </p>
    </div>
    <div class="card-footer">
        
      <small class="text-muted ">Last updated  {{$cat['updated_at']}}</small>
      <br>
      <form style="display: inline;" method="post" action="{{route('cats.destroy',$cat->id)}}">
        @method("delete")
        @csrf
      <input class ="btn btn-danger mt-2" 
      type="submit" value="Delete" >
      </form>
      <a class ="btn btn-info mt-2" style="color: aliceblue;" href="{{route('cats.edit',$cat['id'])}}">Edit</a>
    </div>

</div>
  
</div>
     @endforeach
   
@endsection 
{{-- @section('pagination')


{{ $cats->links() }}

@endsection  --}}
</body>
</html>