<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">PC</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Início</li>
      <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Início</span></a></li>
      <li class="{{ Request::route()->getName() == 'admin.consultas' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.consultas') }}"><i class="fa fa-briefcase-medical"></i> <span>Consultas</span></a></li>
      @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Usuários</li>
      <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
      @endif
    </ul>
</aside>
