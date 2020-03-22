 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary bg-secondary">
  <!-- Brand Logo -->
  <a href="/" class="brand-link navbar-light">
    <img src="{{ asset('images/logo.png') }}"
    alt="AdminLTE Logo"
    class="brand-image"
    style="opacity: .8">
    <span class="brand-text font-weight-bold default-color">{{ config('app.name', 'Latsat') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
  
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-fw fa-cog"></i>
            <p>
              Resume
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/resumelist')}}" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>Resume Database</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/addresume')}}" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>Add Resume</p>
              </a>
            </li>
          </ul>
        </li> --}}
    
        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/category">
            <i class="nav-icon fas fa-home"></i>
            <p>Category</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/type">
            <i class="nav-icon fas fa-cog"></i>
            <p>Type</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/product">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>Product</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/customer">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Customer</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/order">
            <i class="nav-icon far fa-address-card"></i>
            <p>Order List</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="/admin/payment">
            <i class="nav-icon far fa-money-bill-alt"></i>
            <p>Payment List</p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
