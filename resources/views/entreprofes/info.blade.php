@extends('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')])

@section('body')
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
                                <form method="POST" action="{{ route('users.update', Auth::user()->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Campos del formulario -->
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Usuario</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ Auth::user()->username }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::user()->email }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <small class="form-text text-muted">Dejar en blanco para mantener la contraseña
                                            actual.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>

                                    <div class="form-group">
                                        <label for="url">Imagen de Perfil</label>
                                        <input type="file" class="form-control-file" id="url" name="url">
                                        @if (Auth::user()->url)
                                            <div class="mt-2">
                                                <img src="{{ Auth::user()->url }}" alt="Imagen de perfil"
                                                    class="img-thumbnail" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Nota</label>
                                        <textarea class="form-control" id="note" name="note" rows="3">{{ Auth::user()->note }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="position">Cargo</label>
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="{{ Auth::user()->position }}">
                                    </div>

                                    <!-- Mostrar skills -->
                                    <div class="form-group">
                                        <label for="skills">Habilidades</label>
                                        @if (Auth::user()->skills->isEmpty())
                                            <input type="text" class="form-control mt-2" name="skills[]">
                                        @else
                                            @foreach (Auth::user()->skills as $skill)
                                                <input type="text" class="form-control mt-2" name="skills[]"
                                                    value="{{ $skill->skill }}">
                                            @endforeach
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2" onclick="addSkill()">Agregar
                                            habilidad</button>
                                        <div id="skill-list"></div>
                                    </div>

                                    <!-- Mostrar experiences -->
                                    <div class="form-group">
                                        <label for="experience">Experiencias</label>
                                        @if (Auth::user()->experiences->isEmpty())
                                            <input type="text" class="form-control mt-2" name="experiences[]">
                                        @else
                                            @foreach (Auth::user()->experiences as $experience)
                                                <input type="text" class="form-control mt-2" name="experiences[]"
                                                    value="{{ $experience->experience }}">
                                            @endforeach
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addExperience()">Agregar experiencia</button>
                                        <div id="experience-list"></div>
                                    </div>

                                    <!-- Mostrar educations -->
                                    <div class="form-group">
                                        <label for="education">Educación</label>
                                        @if (Auth::user()->educations->isEmpty())
                                            <input type="text" class="form-control mt-2" name="educations[]">
                                        @else
                                            @foreach (Auth::user()->educations as $education)
                                                <input type="text" class="form-control mt-2" name="educations[]"
                                                    value="{{ $education->education }}">
                                            @endforeach
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addEducation()">Agregar educación</button>
                                        <div id="education-list"></div>
                                    </div>

                                    <!-- Mostrar interests -->
                                    <div class="form-group">
                                        <label for="interest">Intereses</label>
                                        @if (Auth::user()->interests->isEmpty())
                                            <input type="text" class="form-control mt-2" name="interests[]">
                                        @else
                                            @foreach (Auth::user()->interests as $interest)
                                                <input type="text" class="form-control mt-2" name="interests[]"
                                                    value="{{ $interest->interest }}">
                                            @endforeach
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addInterest()">Agregar interés</button>
                                        <div id="interest-list"></div>
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

    <script>
        function addSkill() {
            var skillList = document.getElementById('skill-list');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'skills[]';
            newInput.className = 'form-control mt-2';
            skillList.appendChild(newInput);
        }

        function addExperience() {
            var experienceList = document.getElementById('experience-list');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'experiences[]';
            newInput.className = 'form-control mt-2';
            experienceList.appendChild(newInput);
        }

        function addEducation() {
            var educationList = document.getElementById('education-list');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'educations[]';
            newInput.className = 'form-control mt-2';
            educationList.appendChild(newInput);
        }

        function addInterest() {
            var interestList = document.getElementById('interest-list');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'interests[]';
            newInput.className = 'form-control mt-2';
            interestList.appendChild(newInput);
        }
    </script>
@endsection
