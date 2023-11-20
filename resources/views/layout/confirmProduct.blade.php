<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@extends('layout.main')

@section('judul')
  KONFIRMASI PESANAN
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
    {{-- <div class="d-flex" style="align-items: center">
      <form action="" method="GET" style="flex: 1; height: 100%; display: flex; align-items: center; margin: 0;">
      </form>
      <div style="padding-right: 1rem">
      </div>
    </div> --}}

  </div>
  <div class="card-body">
    <div class="card">
      <span style="font-weight: bold; font-size: 2rem; ">DETAIL TRANSAKSI</span>
      <br>
      <span style="font-size: 1rem;">Menu Pesanan : {{ $products->product_name }}</span>
      <span style="font-size: 1rem;"> Kuantitas Pesanan : {{ $quantity }} </span>
      <span style="font-size: 1rem;"> Total Harga : {{ $total_price }} </span>
      <br>
      <form
        action="{{ route('customerProduct.store', [
            'product_id' => $products->id,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]) }}"
        method="POST">
        @csrf
        <button class="btn btn-primary" type="submit">Konfirmasi</button>
      </form>
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
  {{-- 
  <script defer>
    $(document).ready(function () {
      $('#tabel-customer').DataTable()
    })
  </script> --}}
@endsection
