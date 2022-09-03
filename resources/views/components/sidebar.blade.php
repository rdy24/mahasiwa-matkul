<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/dashboard">Mini Project</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/dashboard">MP</a>
    </div>
    <ul class="sidebar-menu">
      @can('is_mahasiswa')
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->routeIs('mahasiswa.show') ? 'active' : '' }}"><a href="{{ route('mahasiswa.show') }}" class="nav-link"><i
            class="fas fa-user"></i><span>Data Anda</span></a>
      </li>
      @endcan

      @can('is_admin') 
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->routeIs('dashboard.') ? 'active' : '' }}"><a href="/dashboard" class="nav-link"><i
            class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Administrator</li>
      <li class="{{ request()->routeIs('dashboard.mahasiswa.*') ? 'active' : '' }}"><a
          href="{{ route('dashboard.mahasiswa.index') }}" class="nav-link"><i class="far fa-user"></i><span>Data Mahasiswa</span></a>
      </li>
      <li class="{{ request()->routeIs('dashboard.matkul.*') ? 'active' : '' }}"><a
          href="{{ route('dashboard.matkul.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Data Mata Kuliah</span></a>
      </li>
      @endcan
    </ul>
  </aside>
</div>