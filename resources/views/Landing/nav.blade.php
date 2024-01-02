<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      .bg-overlay {
    background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("https://unsplash.imgix.net/photo-1416339442236-8ceb164046f8?q=75&fm=jpg&s=8eb83df8a744544977722717b1ea4d09");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    color: #fff;
    height: 450px;
    padding-top: 50px;
}

      .navbar-brand, .nav-link{
        /* color: rgb(27, 27, 73); */
        color: #f6eff1;
        font-weight:900;
        font-family: 'Courier New', Courier, monospace;
        font-style: italic;
      }
      .navbar-brand, .nav-link:hover{
        color: #1d2b64;
      }
      /* body{
        font-family: 'Courier New', Courier, monospace;
        font-style: italic;
      } */
      .create{
        color: aliceblue;
        font-family: 'Courier New', Courier, monospace;
        font-size: 19px;
        font-style: italic;
        font-weight: 700;
      }
      </style>
</head>
<body class="d-flex flex-column min-vh-100">


<nav class="navbar navbar-expand-lg bg-body-tertiary"  style=" background-image: linear-gradient(to right ,
 #f8cdda,#1d2b64">

    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('blog.home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog.posts')}}">Posts</a>
          </li>
          <li class="nav-item">
          <a class ="nav-link"  href="{{route('post.create')}}">create</a> </li>
          <li class="nav-item">
            <a class ="nav-link"  href="{{route('cats.index')}}">Categories</a> </li>
           <li class="nav-item">
            <a class ="nav-link"  href="{{route('cats.create')}}">Create category</a> </li>

            {{-- @dump(auth()->user()->name); --}}
        
            {{-- <li class="nav-item dropdown " style="left:50rem">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ auth()->user()->name }}
              </a> --}}

              {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div> --}}
          </li> 
      



        </ul>

        
      </div>
    </div>
  </nav>

@yield('home')
  <div class="container mt-5">
    @yield('content')
  </div>
</div>
  <nav aria-label="Page navigation example mt-5">
    <ul class="pagination justify-content-center mt-5">
    @yield('pagination')
  </ul>
</nav>


<div class="container-fluid p-0 mb-0 mt-auto">

  <footer class=" text-center text-white"   style=" background-image: linear-gradient(to right ,
  #f8cdda,#1d2b64);">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="#">Nehal Mahdy</a>
  </div>
  <!-- Copyright -->
</footer>
  
</div>
<!-- End of .container -->
</body>