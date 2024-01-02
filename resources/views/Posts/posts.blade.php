
   @extends('Landing.nav')
        @section('content')
            
       
    {{-- <table class="table">
        <tr>
            <th  scope="col">id</th>
            <th  scope="col">title</th>
            <th  scope="col">content</th>
            <th scope="col">show</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['content']}}</td> 
                <td><a class ="btn btn-info" href="/posts/{{$post['id']}}">show</a></td>
            </tr>
        @endforeach
    </table> --}}


    <div class="row row-cols-1 row-cols-md-3 g-4">
         @foreach ($posts as $post)
        <div class="col" >
         
           <div class="card h-100">
            
            <img src="{{asset('images/post_images/'.$post['img'])}}" class="card-img-top"
              alt="Skyscrapers" />
            <div class="card-body">
              <h5 class="card-title">{{$post['title']}}</h5>
              <h6 class="card-title">{{$post['description']}}</h6>
              <p class="card-text">
                {{-- {{$post['title']}} --}}
                {{ Str::limit($post['content'], 20) }} <br><a class ="" href="{{route('post.show',$post['id'])}}">Read More</a>
              </p>

              <p>
                Author :
            
                  <a href="{{route('users.show',$post->user->id)}}">
                 {{$post->user->name}}
                  </a>
                  {{-- @dump($post->user->name) --}}
              </p>
            </div>
            <div class="card-footer">
                
              <small class="text-muted ">Last updated  {{$post['updated_at']}}</small>
              <br>
              {{-- @can("is-admin")

              <a class ="btn btn-danger mt-2" onclick="return confirm('Are you sure?')" 
              href="{{route('post.delete',$post['id'])}}">Delete</a>
             @endcan --}}
             @if(auth()->user()->id == $post['user_id'] || auth()->user()->role == "admin")

             <a class ="btn btn-danger mt-2" onclick="return confirm('Are you sure?')" 
             href="{{route('post.delete',$post['id'])}}">Delete</a>
            @endif

             @if (auth()->user()->id == $post['user_id'] || auth()->user()->role == "admin")
             <a class ="btn btn-info mt-2" style="color: aliceblue;" href="{{route('post.edit',$post['id'])}}">Edit</a>

             @endif
            </div>
   
        </div>
          
        </div>
             @endforeach
           
    @endsection 
    @section('pagination')
  

    {{ $posts->links() }}
    
    @endsection 
</body>
</html>