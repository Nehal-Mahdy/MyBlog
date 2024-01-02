
@extends('Landing.nav')
@section('content')
    

    {{-- <div class="bg-image-vertical h-100" style="background-color: #EFD3E4;
            background-image: url(https://mdbootstrap.com/img/Photos/new-templates/search-box/img1.jpg);
          "> --}}
      <div class="mask mt-5 align-items-center ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="card-body" style=" background-image: linear-gradient(to right , 
              #1c0e55,#303446);">
  
                  <h1 class="mb-5 text-center create">Edit Post</h1>
                  <form action="{{route('post.update',$data['id'])}}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="row">
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text"  value="{{old('title',$data->title)}}" id="form6Example1" name="title" class="form-control" />
                          <label class="form-label create"  for="form6Example1" >Title</label>
                          @error("title")
                          <div class="text-danger ">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" value="{{old('description',$data->description)}}" id="form6Example2"name="desc" class="form-control" />
                          <label class="form-label create" for="form6Example2">Description</label>
                          @error("desc")
                          <div class="text-danger ">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
  

                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                          <div class="form-outline">
                            <img src="{{asset('images/post_images/'.$data['img'])}}"  width="20%" alt="">
                            <h4 class="create">current image</h4>
                            <input type="file" id="form6Example12" value="{{old('img',$data->img)}}" name="img" class="form-control" />
                            <label class="form-label create" for="form6Example12" >Change image</label>
                            @error("img")
                            <div class="text-danger ">
                              {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="number" id="form6Example112" value="{{old('version',$data->version)}}" name="version" class="form-control" />
                            <label class="form-label create" for="form6Example112">Version</label>
                            @error("version")
                            <div class="text-danger ">
                              {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                      </div>
    
  
                    <div class="form-outline mb-4">
                      <textarea type="text" class="form-control" name="content" 
                      id="form6Example7" rows = "5" cols = "60">{{old('content',$data->content)}}  </textarea>
                      <label class="form-label create" for="form6Example7">Content</label>
                      @error("content")
                      <div class="text-danger ">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <button type="submit" name="btn" class="btn btn-rounded create" style="color:white; 
                    background-color: rgb(153, 120, 151)">Edit Post</button>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
      
    </div>
  </section>    
@endsection 

</body>
</html>