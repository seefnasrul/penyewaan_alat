<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Users</li>
      <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
      @endif
      <li class="menu-header">Master</li>
      <li class="{{ Request::route()->getName() == 'alat.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('alat.index') }}"><i class="fa fa-truck-pickup"></i> <span>Alat</span></a></li>
      <li class="menu-header">Transaksi</li>
      <li class="{{-- Request::route()->getName() == 'transaksi.index' ? ' active' : '' --}}"><a class="nav-link" href="{{ route('alat.index') }}"><i class="fa fa-plus-square"></i> <span>Tambah Transaksi</span></a></li>
      
      <li class="{{ Request::route()->getName() == 'transaksi.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fa fa-book-medical"></i> <span>History Transaksi</span></a></li>
      
    </ul>
</aside>
