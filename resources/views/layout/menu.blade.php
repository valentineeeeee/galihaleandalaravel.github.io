@php
  $level = auth()->user()->level;
@endphp


@if ($level == 1)
  <li class="nav-item">
    <a href="{{ url('dashboard') }}" class="nav-link">
      <i class="nav-icon fas fa-compass"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ url('transaction') }}" class="nav-link">
      <i class="nav-icon fas fa-money-bill-wave"></i>
      <p>Transaksi</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ url('product') }}" class="nav-link">
      <i class="nav-icon fas fa-recycle"></i>
      <p>
        Product
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ url('material') }}" class="nav-link">
      <i class="nav-icon fas fa-recycle"></i>
      <p>
        Bahan Baku
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ url('supplier') }}" class="nav-link">
      <i class="nav-icon fas fa-user"></i>
      <p>
        Supplier
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ url('customer') }}" class="nav-link">
      <i class="nav-icon fas fa-user"></i>
      <p>
        Pengguna
      </p>
    </a>
  </li>
@elseif($level == 2)
  <li class="nav-item">
    <a href="{{ url('resupply') }}" class="nav-link">
      <i class="nav-icon fas fa-file"></i>
      <p>Resupply</p>
    </a>
  </li>

@elseif($level == 3)
  <li class="nav-item">
    <a href="{{ url('customerProduct') }}" class="nav-link">
      <i class="nav-icon fas fa-briefcase"></i>
      <p>Product</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ url('customerTransaksi') }}" class="nav-link">
      <i class="nav-icon fas fa-money-bill-wave"></i>
      <p>Transaksi</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ url('editakun') }}" class="nav-link">
      <i class="nav-icon fas fa-file"></i>
      <p>Edit Akun</p>
    </a>
  </li>
@endif
