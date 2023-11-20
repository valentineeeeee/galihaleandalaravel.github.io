@extends('layout.main')

@section('judul')
  Halaman Product
@endsection

@section('isi')

<script>
  setTimeout(function() {
    document.querySelector('.alert').style.display = 'none';
  }, {{ session('timer', 4) }} * 1000);
</script>

<div class="card">
  @if (Session::has('status'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
    </div>
  @endif

  <div class="card">

    <div class="card-header">
      <div class="col-12 d-flex justify-content-between col-xl py-3">
        <a href="{{ route('product.create') }}" class="btn btn-primary">
          Tambah Product
        </a>
      </div>

      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Product</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @if ($data->product_image != '')
                    <img style="height:64px; width:64px; border:2px solid black;"
                      src="{{ asset('storage/photo/' . $data->product_image) }}" alt="">
                  @else
                    <img style="height:64px; width:64px; border:2px solid black;"
                      src="{{ asset('images/Hitori (1).jpg') }}" alt="">
                  @endif
                </td>
                <td>{{ $data->product_name }}</td>
                <td>{{ $data->product_description }}</td>
                <td>{{ $data->product_price }}</td>
                <td class="d-flex">
                  <form action="{{ route('product.destroy', [$data->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                  </form>

                  {{-- <a href="" class="btn btn-danger">Hapus</a> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
  @endsection
