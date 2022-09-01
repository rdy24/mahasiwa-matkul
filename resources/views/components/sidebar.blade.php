<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/dashboard">Mini Project</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/dashboard">MP</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->routeIs('dashboard.') ? 'active' : '' }}"><a href="/dashboard" class="nav-link"><i
            class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Administrator</li>
      <li class="{{ request()->routeIs('dashboard.user.*') ? 'active' : '' }}"><a
          href="" class="nav-link"><i class="far fa-user"></i><span> Data
            User</span></a>
      </li>
    </ul>
  </aside>
</div>