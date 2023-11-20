@extends('layout.main')

@section('judul')
Tambah Supplier
@endsection

@section('isi')

<script>
  setTimeout(function() {
      document.querySelector('.alert').style.display = 'none';
  }, {{ session('timer', 4) }} * 1000);
</script>

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
        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">     
            <div class="form-group">
              <label for="exampleSelectBorder">User</label>
              <select name="user_id" class="custom-select form-control-border" id="exampleSelectBorder">
                @foreach($users as $user)
                <option value="{{ $user->id }}" >{{ $user->username }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Nama Supplier</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="supplier_name" class="form-control" id="exampleInputText1" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat Supplier</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="supplier_address" class="form-control" id="exampleInputText1" placeholder="Alamat">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nomor Telepon</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="supplier_phone" class="form-control" id="exampleInputText1" placeholder="Alamat">
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