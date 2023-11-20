@extends('layout.main')

@section('judul')
List Supplier
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

<div class="card">
    <div class="card-header">
      <div class="col-12 d-flex justify-content-between col-xl py-3">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">
          Tambah Supplier
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-vcenter card-table table table-striped">
            <thead>
              <tr>
              <th>#</th>
              <th>Nama Supplier</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($suppliers as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->supplier_name }}</td>
                <td>{{ $data->user['email'] }}</td>
                <td>{{ $data->supplier_address}}</td>
                <td>{{ $data->supplier_phone }}</td>
                <td>
                  <a href="{{ route('supplier.edit', [$data->id]) }}" class="btn btn-primary" >Edit</a>
                </td>
                <td>
                  <form action="{{ route('supplier.destroy', [$data->id]) }}" method="POST"> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>

                  {{-- <a href="" class="btn btn-danger">Hapus</a> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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

