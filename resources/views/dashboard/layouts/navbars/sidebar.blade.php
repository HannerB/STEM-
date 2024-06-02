<div class="sidebar" data-color="orange" data-background-color="pink" data-image="{{ asset('img/logo.svg') }}">
    <div class="logo p-3 pe-md-0">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="{{ asset('img/logo.svg') }}" alt="logo" >
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            
                <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="material-icons">person</i>
                        <p>Usuarios</p>
                    </a>
                </li>
            

                <li class="nav-item{{ $activePage == 'news' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('news.index') }}">
                        <i class="material-icons">book</i>
                        <p>{{ __('Noticias') }}</p>
                    </a>
                </li>
                
            @can('categorias_index')
                <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="material-icons">category</i>
                        <p>{{ __('Categorias') }}</p>
                    </a>
                </li>
            @endcan
            @can('permission_index')
                <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <i class="material-icons">manage_accounts</i>
                        <p>{{ __('Permisos') }}</p>
                    </a>
                </li>
            @endcan
            @can('role_index')
                <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>{{ __('Roles') }}</p>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
