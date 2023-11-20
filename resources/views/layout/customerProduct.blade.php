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
      <div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif

    <div class="card">

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
                  <form action="{{ route('customerProduct.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary">Beli</button>
                  </form>

                  {{--  --}}
                  {{--  --}}
                  {{--  --}}

                  {{-- <div class="modal fade" id="modal2" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi Pesanan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <form {{ route('customerProduct.create') }}>
                            <div class="form-group">
                              <label>Kuantitas</label>
                              <input type="number" name="" class="form-control">
                            </div>
                          </form>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">SUBMIT</button>
                          <button type="reset" class="btn btn-danger">RESET</button>
                        </div>
                      </div>
                    </div>
                  </div> --}}


                  {{-- <form action="{{ route('product.destroy', [$data->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                  </form> --}}
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

    {{-- <script>
      $(document).ready(function() {
        $('.form-confirm').submit(function(e) {
          e.preventDefault()
          var id = $(this).data('id')

          // Ambil data dari input angka pada form ini yang memiliki nama 'confirm-jumlah'
          var jumlah = $(this).find('[name=confirm-jumlah]').val()

          alert('Anda akan membeli ' + jumlah + ' produk dengan id ' + id)

          // Dengan data jumlah dan id, kirim request POST kepada customerProduct/confirm/{idProduct}
          $.ajax({
            url: '/customerProduct/confirm/' + id,
            method: 'POST',
            success: function(data) {
              alert('Berhasil membeli produk')
              alert(JSON.stringify(data))
            },
            error: function(xhr) {
              alert('Gagal membeli produk')
              alert(JSON.stringify(xhr))
            }
          })
        })
      })
    </script> --}}
  @endsection
