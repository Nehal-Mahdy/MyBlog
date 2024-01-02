
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
  
                  <h1 class="mb-5 text-center create">New Post</h1>
{{--   
                  @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>
                       {{$error}}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  @endif --}}
                  <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" value="{{old('title')}}" id="form6Example1" name="title" class="form-control" />
                          <label class="form-label create" for="form6Example1" >Title</label>
                          @error("title")
                          <div class="text-danger ">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="form6Example2" value="{{old('desc')}}" name="desc" class="form-control" />
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
                            <input type="file" id="form6Example12" value="{{old('img')}}" name="img" class="form-control" />
                            <label class="form-label create" for="form6Example12" >Image</label>
                            @error("img")
                            <div class="text-danger ">
                              {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="number" value="{{old('version')}}" id="form6Example112"name="version" class="form-control" />
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
                      <select class="form-select" name="cat_id" id="select">
                       
                        <option selected>Select Category</option>
                        @foreach($cats as $cat)
                        <option value={{$cat->id}}>{{$cat->name}}</option>
                        @endforeach
                    
                      </select>                     
                       <label class="form-label create" for="select">Category</label>

                      </div>
                    <div class="form-outline mb-4">
                      <textarea class="form-control" value="{{old('content')}}" name="content" id="form6Example7" rows="4"></textarea>
                      <label class="form-label create" for="form6Example7">Content</label>
                      @error("content")
                      <div class="text-danger ">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <button type="submit" name="btn" class="btn btn-rounded create" style="color:white; background-color: rgb(153, 120, 151)">Add Post</button>
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