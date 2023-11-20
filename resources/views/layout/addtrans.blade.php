@extends('layout.main')

@section('judul')
Beli Product
@endsection

@section('isi')

<div class="card">
  <div class="card card-primary">
    @if ($errors-> any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> 
        @endforeach
      </ul>
    </div>
    @endif
</div>

  

    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection 