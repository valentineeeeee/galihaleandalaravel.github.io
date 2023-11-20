@extends('layout.main')

@section('judul')
  Beli Product
@endsection


@section('isi')

  <div class="card">
    <div class="card card-primary">
      @if ($errors->any())
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
      <form action="{{ route('customerProduct.terima') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $products->id }}">

        <div class="card-body">
          <div class="form-group">
            <label for="Item">{{ $products->product_name }}</label>
            <br>

            <label for="exampleInputEmail1">Jumlah Item</label> <span style="color: red; font-size:14px;">*Wajib
              diisi</span>
              
            <input type="number" name="transaction_qty" class="form-control" id="exampleInputEmail1"
              placeholder="Masukkan Jumlah">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
