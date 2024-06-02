@extends('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')])

@section('body')
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div id="wrapper">
        @include('layouts.navbars.mega-menu')
        <div class="main-area">
            <div class="container portada"></div>

            <head>
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    .custom-form-container {
                        border: 1px solid #ddd;
                        padding: 30px;
                        border-radius: 10px;
                        background-color: #f9f9f9;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        max-width: 800px;
                        margin: 20px auto;
                    }
                </style>
            </head>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card custom-form-container">
                            <div class="card-header bg-primary text-white">Editar Perfil</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('users.update', Auth::user()->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Campos del formulario -->
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Usuario</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <small class="form-text text-muted">Dejar en blanco para mantener la contraseña actual.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>

                                    <div class="form-group">
                                        <label for="url">Imagen de Perfil</label>
                                        <input type="file" class="form-control-file" id="url" name="url">
                                        @if(Auth::user()->url)
                                            <div class="mt-2">
                                                <img src="{{ Auth::user()->url }}" alt="Imagen de perfil" class="img-thumbnail" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Nota</label>
                                        <textarea class="form-control" id="note" name="note" rows="3">{{ Auth::user()->note }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="position">Posición</label>
                                        <input type="text" class="form-control" id="position" name="position" value="{{ Auth::user()->position }}" minlength="25">
                                    </div>

                                    <div class="form-group">
                                        <label for="interest">Interés</label>
                                        <input type="text" class="form-control" id="interest" name="interest" value="{{ Auth::user()->interest }}" minlength="25">
                                    </div>

                                    <div class="form-group">
                                        <label for="experience">Experiencia</label>
                                        <input type="text" class="form-control" id="experience" name="experience" value="{{ Auth::user()->experience }}" minlength="25">
                                    </div>

                                    <div class="form-group">
                                        <label for="education">Educación</label>
                                        <input type="text" class="form-control" id="education" name="education" value="{{ Auth::user()->education }}" minlength="25">
                                    </div>

                                    <div class="form-group">
                                        <label for="skills">Habilidades</label>
                                        <input type="text" class="form-control" id="skills" name="skills" value="{{ Auth::user()->skills }}" minlength="25">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="{{ route('CardsProfes') }}" class="btn btn-secondary">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
        <div class="menu-fader"></div>
        <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
    </div>
@endsection
