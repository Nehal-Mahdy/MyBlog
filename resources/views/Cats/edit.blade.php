
@extends('Landing.nav')
@section('content')
    

    {{-- <div class="bg-image-vertical h-100" style="background-color: #EFD3E4;
            background-image: url(https://mdbootstrap.com/img/Photos/new-templates/search-box/img1.jpg);
          "> --}}
      <div class="mask mt-5 align-items-center ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10 justify-content-center">
              <div class="card" style="border-radius: 1rem;">
                <div class="card-body" style=" background-image: linear-gradient(to right ,
#16045d,#747b99);">
  
                  <h1 class="mb-5 text-center create">Edit Category</h1>
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
                  <form action="{{route('cats.update',$cat['id'])}}" method="POST" enctype="multipart/form-data">
                    @method("put")

                    @csrf
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline">
                            @error("name")
                          <div class="text-danger ">
                            {{$message}}
                          </div>
                          @enderror 
                          <input type="text" value="{{old('name',$cat->name)}}" id="form6Example1" name="name" class="form-control" />
                          <label class="form-label create" for="form6Example1" >Category's name</label>
                       
                      </div>
                          <div class="form-outline">
                             @error("img")
                            <div class="text-danger ">
                              {{$message}}
                            </div>
                            @enderror
                            <img src="{{asset('images/cat_images/'.$cat['img'])}}" width="20%" alt="" >
                            <h4 class="create">current image</h4>
                            <input type="file" id="form6Example12" value="{{old('img',$cat->img)}}" name="img" class="form-control mt-1" />
                            <label class="form-label create" for="form6Example12" >Change Image</label>
                           
                          </div>
                        </div>
                    <div class="text-center ">
                    <button type="submit" name="btn" class="btn btn-rounded create" style="position: relative; color:white; background-color: rgb(153, 120, 151)">Edit</button>
                    </div>    
                </div> 
                </form>
  
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>
  </section>    
@endsection 

</body>
</html>