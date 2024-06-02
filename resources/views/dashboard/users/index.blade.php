@extends('dashboard', ['activePage' => 'users', 'titlePage' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Usuarios</h4>
                        <p class="card-category">Usuarios registrados</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-info">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Rol</th>
                                    <th class="text-right">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <th><img src="{{ asset($user->url) }}" alt="Imagen de usuario"
                                                style="max-width: 100px;"></th>
                                        <td>{{ $user->state == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            @if ($user->role)
                                            <span class="badge badge-info">
                                                {{ $user->role->name }}
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                No roles
                                            </span>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i
                                                    class="material-icons">person</i></a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i
                                                    class="material-icons">edit</i></a>
                                            @if ($user->state == 1)
                                            <form action="{{ route('users.deactivate', $user->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro?')"
                                                style="display: inline-block;">
                                                @csrf
                                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">visibility_off</i>
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('users.activate', $user->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro?')"
                                                style="display: inline-block;">
                                                @csrf
                                                <button type="submit" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                    &laquo;
                                </a>
                            </li>

                            {{-- Pagination Elements --}}
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor

                                {{-- Next Page Link --}}
                                <li
                                    class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection