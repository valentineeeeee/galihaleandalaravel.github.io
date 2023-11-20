@extends('layout.main')

@section('judul')
Transaksi
@endsection

@section('isi')

<div class="card">
    <div class="card-header">
      <div class="col-12 d-flex justify-content-between col-xl py-3">
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
          Tambah Transaksi
        </a>
        {{-- <i style="font-weight:bold; font-style:normal;">TOTAL CUSTOMER : {{ count($users) }}</i> --}}
      </div>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-vcenter card-table table table-striped ">
            <thead>
              <tr>
              <th>#</th>
              <th>Nama Customer</th>
              <th>Product</th>
              <th>Kuantitas</th>
              <th>Total</th>
              <th>Status</th>
              <th>Waktu Tiba</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="text-transform:capitalize;">{{ $data->users['username'] }}</td>
                <td>{{ $data->products['product_name']}}</td>
                <td>{{ $data->transaction_qty}}</td>
                <td>{{ $data->transaction_total_price }}</td>
                <td>{{ $data->transaction_status }}</td>
                <td>{{ $data->transaction_arrival_date }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>  
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
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
@endsection 

