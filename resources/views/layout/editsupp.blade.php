@extends('layout.main')

@section('judul')
Edit Supplier
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
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form action="{{ route('supplier.update', $suppliers->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Supplier</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="supplier_name" value="{{ $suppliers->supplier_name }}" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat Supplier</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="supplier_address" value="{{ $suppliers->supplier_address }}" class="form-control" id="exampleInputText1" placeholder="Masukkan alamat">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No. Telepon</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
                <input type="number" name="supplier_phone" value="{{ $suppliers->supplier_phone }}" class="form-control" id="exampleInputPassword1" placeholder="No. Telepon">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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