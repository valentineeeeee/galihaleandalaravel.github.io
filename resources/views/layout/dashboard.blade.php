@extends('layout.main')

@section('judul')
  Halaman Dashboard
@endsection

@section('isi')
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill" style="color:aliceblue;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaksi</span>
              <span class="info-box-number">
                {{ count($transaksi) }}
                <small></small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"
                style="color:aliceblue;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengguna</span>
              <span class="info-box-number">{{ count($users) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user" style="color:#ffff;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Supplier</span>
              <span class="info-box-number">{{ count($suppliers) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produk</span>
              <span class="info-box-number">{{ count($product) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <div class="card-tools">
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">

        <div class="col-4">
          <div>Penjualan Coffee</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/06b5ade5-edbe-4f0c-b5d8-6213529ef5f2/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-4">
          <div>Metode Pembayaran Paling Populer</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/c306d36a-9240-4748-8be4-8026e2c4a7dc/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-4">
          <div>Tipe Coffee</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/38d827fc-b5b0-45fc-ba30-193b7f0ba067/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-4">
          <div>Penjualan Coffee</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/53a936c4-b8c5-4422-b0e3-6f6d76fd05bf/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-4">
          <div>Kuantitas Pelayanan Kasir</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/87acae20-c65f-4023-856b-05408c93c67c/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-4">
          <div>Kuantitas Pembayaran Berdasarkan Kasir</div>
          <iframe width="400" height="300" src="https://lookerstudio.google.com/embed/reporting/ef4570a0-7c11-4c1d-a0e6-31ba71b26354/page/exkWD" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
<br>
        <div class="col-6 ml-5">
          <br>
          <div class="about-img">
            <label for="">Forecasting Salted Caramel Coffee</label>
            <img style="height: 200px;" src="{{ asset('images/sccfore.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>

        <div class="col-6 ml-5 ">
          <br>
          <div class="about-img">
            <label for="">No BackOrder Salted Caramel Coffee</label>
            <img style="height: 200px;" src="{{ asset('images/Agregat Salted Caramel Coffee.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>

        <div class="col-4 ml-5 ">
          <br>
          <div class="about-img">
            <label for="">BackOrder Salted Caramel Coffee</label>
            <img style="height: 200px;" src="{{ asset('images/sscnoback.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>

        <div class="col-6 ml-5 ">
          <br>
          <div class="about-img">
            <label for="">MRP Salted Caramel Coffee</label>
            <img style="height: 200px;" src="{{ asset('images/bcmrp.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>

        <div class="col-6 ml-5 ">
          <br>
          <div class="about-img">
            <label for="">MRP Salted Caramel Coffee</label>
            <img style="height: 200px;" src="{{ asset('images/ROPSCC.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>

        

      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
