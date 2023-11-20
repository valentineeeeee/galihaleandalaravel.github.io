<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Atlas | Register</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />


<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>


  </head>

  <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

<style>
.bg-image-vertical {
position: relative;
overflow: hidden;   
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: auto;
}
}
</style>

<script>
  setTimeout(function() {
      document.querySelector('.alert').style.display = 'none';
  }, {{ session('timer', 4) }} * 1000);
</script>

  <body>
    <!-- Start your project here-->
    <section class="vh-100">
        <div class="container-fluid" style="background-color:#37251b;">
          <div class="row">
            <div class="col-sm-6">
              <div class="px-5 ms-xl-4 mt-5">
                @if ($errors-> any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                    @endforeach
                  </ul>
                </div>
                @endif
                <span class="h1 fw-bold mb-0" style="color:wheat; letter-spacing: 4px; ">GET STARTED !</span> <br>
                <span class="h5 mb-0" style="color:wheat;  ">Buat akun mu dibawah ini !</span>
              </div>
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">      
                <form action="{{url('register/create')}}" style="width: 23rem;" method="POST" enctype="multipart/form-data" style="color:wheat;">
                  @csrf
                  <h3 class="fw-normal mb-5 pb-5" style="letter-spacing: 1px;" style="color:wheat;"></h3>
                  <div class="form-outline mb-4" style="color:wheat;">
                    <input autofocus type="email" name="email" value="{{ Session::get('email') }}" id="form2Example18" class="form-control form-control-lg" style="color:wheat;" />
                    <label class="form-label" for="form2Example18" style="color:wheat;" >Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input autofocus type="text" name="username" id="form2Example18" class="form-control form-control-lg" style="color:wheat;" />
                    <label class="form-label" for="form2Example28" style="color:wheat;">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input autofocus type="hidden" name="name" value="Customer" id="form2Example18" class="form-control form-control-lg" style="color:wheat;" />
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input autofocus type="hidden" name="level" value="3" id="form2Example18" class="form-control form-control-lg" style="color:wheat;" />
                  </div>
                  
      
                  <div class="form-outline mb-4">
                    <input type="password" name="password" value="{{ Session::get('password ') }}" id="form2Example28" class="form-control form-control-lg" style="color:wheat;"  />
                    <label class="form-label" for="form2Example28" style="color:wheat;">Password</label>
                  </div>
                  
                  <div class="form-outline mb-4" >
                    <input type="file" name="image" id="image" class="form-control form-control-lg" style="color:wheat;" />
                    <label class="form-label" for="form2Example28" style="color:wheat;"></label>
                  </div>
      
                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block" type="button" style="color:#37251b; background-color:wheat; "> <a href=""></a> Register</button>
                  </div>
                  <p style="color: wheat;">Sudah punya akun? <a href="/login" class="link-info" style="color:wheat;">Login disini</a></p>
      
                </form>
      
              </div>
      
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src= "https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                alt="" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
          </div>
        </div>
      </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
