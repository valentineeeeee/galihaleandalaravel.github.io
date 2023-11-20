@extends('layout.main')

@section('judul')
Halaman Dashboard
@endsection

@section('isi')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Selamat Datang&nbsp;{{ $user->username }}</h3>

      <div class="card-tools">
      </div>
    </div>
    <div class="card-body">
      <div class="alert alert-success">
        Halo selamat datang
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection 