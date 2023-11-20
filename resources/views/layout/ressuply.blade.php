@extends('layout.main')

@section('judul')
Resupply Bahan
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
          Tambah Resupply
        </a>
      </div>
      
      <div class="table-responsive">
        <table class="table table-vcenter card-table table-stripped">
          <thead>
            <tr>
            <th>#</th>
            <th>Supplier</th>
            <th>Material</th>
            <th>Kuantitas Resupply</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Aksi</th>
            <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ressuplies as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->supplier->supplier_name ?? 'Tidak Ada Supplier' }}</td>
              <td>{{ $data->material->material_name }}</td>
              <td>{{ $data->resupply_qty }}</td>
              <td>{{ $data->resupply_date_finished}}</td>
              <td>{{ $data->resupply_status}}</td>
              <td>
                <div style="display: flex; gap: .5rem;">
                    @if ($data->resupply_status == 'Pending')
                        <form
                            action="{{ route('change_status', ['resupply_id' => $data->id, 'status' => 'On Process']) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </form>
                        <form
                            action="{{ route('change_status', ['resupply_id' => $data->id, 'status' => 'ditolak']) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    @elseif ($data->resupply_status == 'On Process')
                        <form
                            action="{{ route('change_status', ['resupply_id' => $data->id, 'status' => 'Complete']) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Selesai</button>
                        </form>
                    @endif
                </div>
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