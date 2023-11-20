<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@extends('layout.main')

@section('judul')
  List User
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
    <div class="d-flex" style="align-items: center">
      <form action="" method="GET" style="flex: 1; height: 100%; display: flex; align-items: center; margin: 0;">
        <div class="col-12 d-flex justify-content-between col-xl py-3">
          <div class="input-group rounded col-7 d-flex" style="gap: 1rem ">
            <input type="text" name="search" class="form-control rounded" style="width: 420px" placeholder="Search"
              aria-label="Search" aria-describedby="search-addon" />
            <button class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </button>
            <a href="{{ route('customer.create') }}" class="btn btn-primary">
              Tambah User
            </a>
          </div>
        </div>
      </form>
      <div style="padding-right: 1rem">

        <i style="font-weight:bold; font-style:normal;">TOTAL USER : {{ count($pengguna) }}</i>

      </div>
    </div>

  </div>
  <div class="card-body">
    <div class="card">
      {{-- <div > --}}
      <div class="table-responsive">
        <table class="card-table table table-striped table table-valign-middle ">
          {{-- <table id="tabel-customer"> --}}
          <thead>
            <tr>
              <th>#</th>
              <th>Level</th>
              <th>Username</th>
              <th>Email</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $data)
              <tr>
                <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>
                  @if ($data->image != '')
                    <img style="height:64px; width:64px; object-fit: cover;"
                      src="{{ asset('storage/photo/' . $data->image) }}" alt="">
                  @else
                    <img style="height:64px; width:64px; object-fit: cover;" src="{{ asset('images/Hitori (1).jpg') }}"
                      alt="">
                  @endif
                </td>
                <td>
                  <a href="{{ route('customer.edit', [$data->id]) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                  <form action="{{ route('customer.destroy', [$data->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 16px;" type="submit" class="btn btn-danger">Hapus</button>
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
    {{ $users->withQueryString()->links() }}
    <div class="card-tools">
    </div>
  </div>
  <!-- /.card-footer-->
  </div>

  @if (session()->has('message'))
    <script>
      alert({{ session()->get('message') }})
    </script>
  @endif
  {{-- 
  <script defer>
    $(document).ready(function () {
      $('#tabel-customer').DataTable()
    })
  </script> --}}
@endsection
