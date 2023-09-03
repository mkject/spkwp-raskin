<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/warga') }}">
              <i class="mdi mdi-database menu-icon"></i>
              <span class="menu-title">Data Warga</span>
            </a>
          </li>
          @if (Auth::user()->role_as == '1') 
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/kriteria') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Kriteria</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/alternatif') }}">
              <i class="mdi mdi-file menu-icon"></i>
              <span class="menu-title">Alternatif</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/perhitungan') }}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Perhitungan</span>
            </a>
          </li>
          @if (Auth::user()->role_as == '1') 
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}">Tambah User</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">Daftar User</a></li>
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>