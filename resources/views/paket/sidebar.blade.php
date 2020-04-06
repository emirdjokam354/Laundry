<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#2F63C7;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color:#ffffff;font-family: 'Righteous', cursive;">Snapwash Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-4 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::check())
            <img src="{{ url('uploadgambar')}}/{{ Auth::user()->gambar }}" class="img-circle elevation-2" alt="User Image" style="width:50px;height:50px;margin-top:4px">
          @endif
        </div>
        @if (Auth::check())
        <div class="info">
          <a href="#" class="d-block" style="font-size:20px; color:#ffffff;">{{ Auth::user()->name }}</a>
          <p style="color:#F2F2F2;font-size:20">
            <span class="badge badge-danger right text-danger" style="border-radius:200%; height:15px;">6</span>
            {{Auth::user()->role}}
          </p>
          
        </div> 
        @endif
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt" style="color:#ffffff"></i>
              <p style="color:white;font-weight:bold">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users" style="margin-left:5px;color:#ffffff"></i>
              <p style="margin-left:5px;color:white;font-weight:bold">
                Management User
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/management/administrator" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/management/kasir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/management/owner" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Owner</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/pelanggan" class="nav-link">
              <i class="fas fa-user-plus" style="margin-left:5px;color:#ffffff"></i>
                <p style="margin-left:5px;color:white;font-weight:bold">
                    Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/outlet" class="nav-link ">
             <i class="fas fa-store-alt" style="margin-left:5px;color:#ffffff"></i>
              <p style="margin-left:5px;color:white;font-weight:bold">
                Outlet
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/paket" class="nav-link active">
              <i class="fas fa-tshirt" style="margin-left:5px;color:#ffffff"></i>
              <p style="margin-left:5px;color:white;font-weight:bold">
                 Paket Laundry
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/transaksi" class="nav-link">
              <i class="fas fa-shopping-cart" style="margin-left:5px;color:#ffffff"></i>
              <p style="margin-left:5px;color:white;font-weight:bold">
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/laporan" class="nav-link">
              <i class="fas fa-book" style="margin-left:5px;color:#ffffff"></i>
              <p style="margin-left:5px;color:white;font-weight:bold">
                Laporan
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>