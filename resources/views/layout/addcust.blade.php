@extends('layout.main')

@section('judul')
Tambah User
@endsection

@section('isi')

<div class="card">
  <div class="card card-primary">
    @if ($errors-> any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> 
        @endforeach
      </ul>
    </div>
    @endif
    <div class="card card-primary">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleSelectBorder">Level</label>
              <select name="level" class="custom-select form-control-border" id="exampleSelectBorder">
                <option value="2" >Supplier</option>
                <option value="3" >Customer</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="username" class="form-control" id="exampleInputText1" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Photo</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" id="image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                {{-- <div class="mb-3">
                  <label for="level">User</label>
                  <select name="level" id="level" class="form-control" required>
                    <option value=""></option>
                  </select>
                </div> --}}

                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection 