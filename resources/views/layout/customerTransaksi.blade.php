<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">  

@extends('layout.main')

@section('judul')
Transaksi
@endsection

@section('isi')

<div class="card">
    <div class="card-header">
      <div class="col-12 d-flex justify-content-between col-xl py-3">
        {{-- <i style="font-weight:bold; font-style:normal;">TOTAL CUSTOMER : {{ count($users) }}</i> --}}
      </div>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="table-responsive">
          <table class="card-table table table-striped table table-valign-middle ">
            <thead>
              <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Kuantitas</th>
              <th>Total Harga</th>
              <th>Status</th>
              <th>Waktu Kedatangan</th>
              </tr>
            </thead>
            <tbody>
           @foreach ($transactions as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>
                  @if ($data->image != '')
                  <img style="height:64px; width:64px; border:2px solid black;" src="{{asset('storage/photo/'.$data->image)}}" alt="">
                  @else
                  <img style="height:64px; width:64px; border:2px solid black;" src="{{asset('images/Hitori (1).jpg')}}" alt="">
                  @endif
                </td> --}}
                {{-- <td>{{ $data->transactions['transactions_qty']}}</td> --}}
                <td style="text-transform:uppercase;">{{ $data->products['product_name'] }}</td>
                <td>{{ $data->transaction_qty }}</td>
                <td>{{ $data->transaction_total_price }}</td>
                <td>{{ $data->transaction_status }}</td>
                <td>{{ $data->transaction_arrival_date }}</td>
                <td>
                  @if ($data->transaction_status == 'Pending')
                  <form action="{{ route('finish_transaksi', ['transaction_id' => $data->id]) }}" method="POST"> 
                    @csrf
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                  </form>
                  @endif
                  {{-- <a href="" class="btn btn-danger">Hapus</a> --}}
                </td>
                {{-- <td>
                  <a href="{{ route('customer.edit', [$data->id]) }}" class="btn btn-primary" >Edit</a>
                </td>
                <td>
                  <form action="{{ route('customer.destroy', [$data->id]) }}" method="POST"> 
                    @csrf
                    @method('DELETE')
                  </form>

                  <a href="" class="btn btn-danger">Hapus</a>
                </td> --}}
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

