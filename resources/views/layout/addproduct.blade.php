@extends('layout.main')

@section('judul')
Tambah Product
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
      <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, {{ session('timer', 4) }} * 1000);
    </script>
    </div>
    @endif
    <div class="card card-primary">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            {{-- <div class="form-group">
              <label for="exampleSelectBorder">User</label>
              <select name="supplier_id" class="custom-select form-control-border" id="exampleSelectBorder">
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" >{{ $supplier->supplier_name }}</option>
                @endforeach
              </select>
            </div> --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Product</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="product_name" class="form-control" id="exampleInputText1" placeholder="Nama Material">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga Produk</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
                <input type="number" name="product_price" class="form-control" id="exampleInputText1" placeholder="Harga Material">
            </div>
            <br>
            
            <label>Material</label>
            <div class="row">
                  <!-- text input -->
                  @foreach($materials as $material)
                  <div class="form-group col-2">
                    <label>{{ $material->material_name }}</label>
                    <input type="number" class="form-control" name="product_material[{{ $material->id }}]" placeholder="Material..">
                  </div>
                  @endforeach
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi Produk</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
                <input type="text" name="product_description" class="form-control" id="exampleInputText1" placeholder="Masukkan Deskripsi">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Produk</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="product_image" id="product_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Masukkan Gambar</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
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
  @if (session()->has('message'))
  <script>
    alert({{ session()->get('message') }})
  </script>
  @endif
@endsection     