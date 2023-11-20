@extends('layout.main')

@section('judul')
Edit Material
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
        <form action="{{ route('material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Material</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="text" name="material_name" value="{{ $material->material_name }}" class="form-control" id="exampleInputText1" placeholder="Nama Material">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga Material</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
                <input type="number" name="material_price" value="{{ $material->material_price}}" class="form-control" id="exampleInputText1" placeholder="Harga Material">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stock Material</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <input type="number" name="material_stock" value="{{ $material->material_stock }}" class="form-control" id="exampleInputText1" placeholder="Stock Material">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Waktu Tunggu</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
            <input type="number" name="material_lt" value="{{ $material->material_lt }}" class="form-control" id="exampleInputText1" placeholder="Lead Time Material">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Waktu Pemesanan Kembali</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
          <input type="number" name="material_rop" value="{{ $material->material_rop }}" class="form-control" id="exampleInputText1" placeholder="Reorder Point Material">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Waktu MRP</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
        <input type="number" name="material_mrp" value="{{ $material->material_mrp }}" class="form-control" id="exampleInputText1" placeholder="MRP Material">
    </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi Material</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
        <input type="text" name="material_description" value="{{ $material->material_description }}" class="form-control" id="exampleInputText1" placeholder="Masukkan Deskripsi">
      </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Material</label> <span style="color: red; font-size:14px;">*Wajib diisi</span>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="material_image" id="material_image" class="custom-file-input" id="exampleInputFile">
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
@endsection 