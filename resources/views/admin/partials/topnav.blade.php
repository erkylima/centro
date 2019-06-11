<form class="form-inline mr-auto" action="{{ route('admin.users') }}">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>

</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg{{ Auth::user()->unreadNotifications->count() ? ' beep' : '' }}"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notificação
            <div class="float-right">
            <a href="#">Marcar Todas como Lida</a>
            </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
            @if(Auth::user()->unreadNotifications->count())
            @for($i = 1; $i < 40; $i++)
            <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-code"></i>
            </div>
            <div class="dropdown-item-desc">
                Atualização do template disponível!
                <div class="time text-primary">2 min atrás</div>
            </div>
            </a>
            @endfor
            @else
            <p class="text-muted p-2 text-center">Não há notificação!</p>
            @endif
        </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ Auth::user()->avatarlink }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Olá, {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Bem Vindo, {{ Auth::user()->name }}</div>
        <a href="{{ Auth::user()->profilelink }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Editar Perfil
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
        </div>
    </li>
</ul>
