@extends('dashboard', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <div class="card-title">Usuarios</div>
                            <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-lg-6 col-12">
                                    <div class="card card-profile mt-4">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                                <div class="p-3 pe-md-0">
                                                    <img src="{{ $user->url }}" alt="image" class="w-100 border-radius-md shadow-lg rounded img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                                <div class="card-body ps-lg-0">
                                                    <h5 class="mb-0">{{ $user->name }}</h5>
                                                    <h6 class="text-info">ID</h6>
                                                    <p class="mb-0">{{ $user->id }}</p>
                                                    <h6 class="text-info">Nombre</h6>
                                                    <p class="mb-0">{{ $user->name }}</p>
                                                    <h6 class="text-info">Username</h6>
                                                    <p class="mb-0">{{ $user->username }}</p>
                                                    <h6 class="text-info">Roles</h6>
                                                    <p class="mb-0">
                                                        {{--
                                                        @forelse ($user->roles as $role)
                                                             <span class="badge rounded-pill bg-dark text-white">{{ $role->name }}</span>
                                                         @empty
                                                             <span class="badge badge-danger bg-danger">No roles</span>
                                                         @endforelse
                                                         --}}
                                                    </p>
                                                    <h6 class="text-info">Email</h6>
                                                    <p class="mb-0"><span class="badge badge-primary">{{ $user->email }}</span></p>
                                                    <h6 class="text-info">Fecha De Creaccion</h6>
                                                    <p class="mb-0">{{ $user->created_at }}</p>
                                                    <h6 class="text-info">Fecha De Actualización</h6>
                                                    <p class="mb-0">{{ $user->updated_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('users.index') }}"type="submit"
                                        class="btn btn-sm btn-danger">Volver</a>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"> Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
