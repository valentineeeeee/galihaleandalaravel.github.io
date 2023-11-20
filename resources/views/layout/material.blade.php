@extends('layout.main')

@section('judul')
Bahan Baku
@endsection

@section('isi')

<script>
  setTimeout(function() {
      document.querySelector('.alert').style.display = 'none';
  }, {{ session('timer', 4) }} * 1000);
</script>

<div class="card">
  @if(Session::has('status'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
  </div> 
  @endif
    <div class="card-header">
        <div class="col-12 d-flex justify-content-between col-xl py-3">
        <a href="{{ route('material.create') }}" class="btn btn-primary">
          Tambah Bahan Baku
        </a>
      </div>
      
      <div class="table-responsive">
        <table class="table table-vcenter card-table table-stripped">
          <thead>
            <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Supplier</th>
            <th>Material</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>MRP</th>
            <th>ROP</th>
            <th>Waktu Tunggu</th>
            <th>Aksi</th>
            <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($materials as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                @if ($data->material_image != '')
                <img style="height:64px; width:64px; object-fit: cover;" src="{{asset('storage/photo/'.$data->material_image)}}" alt="">
                @else
                <img style="height:64px; width:64px; object-fit: cover;" src="{{asset('images/Hitori (1).jpg')}}" alt="">
                @endif
              </td>
              <td>{{ $data->supplier->supplier_name ?? 'Tidak Ada Supplier' }}</td>
              <td>{{ $data->material_name }}</td>
              <td>{{ $data->material_price}}</td>
              <td>{{ $data->material_stock}}</td>
              <td>{{ $data->material_mrp}}</td>
              <td>{{ $data->material_rop}}</td>
              <td>{{ $data->material_lt}}&nbsp;Hari</td>
              <td class="d-flex">
                
              <a href="{{ route('material.edit', [$data->id]) }}" class="btn btn-primary" >Edit</a>
                <form action="{{ route('material.destroy', [$data->id]) }}" method="POST"> 
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