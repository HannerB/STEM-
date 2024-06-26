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
                                        <label for="position">Posición</label>
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="{{ Auth::user()->position }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="area">Área</label>
                                        <input type="text" name="area" id="area" class="form-control"
                                            value="{{ Auth::user()->area }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Número de Teléfono</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            value="{{ Auth::user()->phone_number }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter_link">Link de Twitter</label>
                                        <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                            value="{{ Auth::user()->twitter_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_link">Link de Facebook</label>
                                        <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                            value="{{ Auth::user()->facebook_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin_link">Link de LinkedIn</label>
                                        <input type="url" name="linkedin_link" id="linkedin_link"
                                            class="form-control" value="{{ Auth::user()->linkedin_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin_link">Universidad</label>
                                        <input type="text" name="college" id="college"
                                            class="form-control" value="{{ Auth::user()->college }}">
                                    </div>


                                    <!-- Mostrar skills -->
                                    <div class="form-group">
                                        <label for="skills">Habilidades</label>
                                        @if (Auth::user()->skills->isNotEmpty())
                                            @foreach (Auth::user()->skills as $skill)
                                                <div class="input-group mt-2" id="skill-{{ $skill->id }}">
                                                    <input type="text" class="form-control" name="skills[]"
                                                        value="{{ $skill->skill }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeSkill({{ $skill->id }})">Eliminar</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <input type="text" class="form-control" name="skills[]"
                                                placeholder="Agregar habilidad">
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addSkill()">Agregar habilidad</button>
                                        <div id="skill-list"></div>
                                    </div>

                                    <!-- Mostrar experiences -->
                                    <div class="form-group">
                                        <label for="experience">Experiencias</label>
                                        @if (Auth::user()->experiences->isNotEmpty())
                                            @foreach (Auth::user()->experiences as $experience)
                                                <div class="input-group mt-2" id="experience-{{ $experience->id }}">
                                                    <input type="text" class="form-control" name="experiences[]"
                                                        value="{{ $experience->experience }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeExperience({{ $experience->id }})">Eliminar</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <input type="text" class="form-control" name="experiences[]"
                                                placeholder="Agregar experiencia">
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addExperience()">Agregar experiencia</button>
                                        <div id="experience-list"></div>
                                    </div>

                                    <!-- Mostrar educations -->
                                    <div class="form-group">
                                        <label for="education">Educación</label>
                                        @if (Auth::user()->educations->isNotEmpty())
                                            @foreach (Auth::user()->educations as $education)
                                                <div class="input-group mt-2" id="education-{{ $education->id }}">
                                                    <input type="text" class="form-control" name="educations[]"
                                                        value="{{ $education->education }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeEducation({{ $education->id }})">Eliminar</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <input type="text" class="form-control" name="educations[]"
                                                placeholder="Agregar educación">
                                        @endif
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addEducation()">Agregar educación</button>
                                        <div id="education-list"></div>
                                    </div>

                                    <!-- Mostrar interests -->
                                    <div class="form-group">
                                        <label for="interest">Intereses</label>
                                        @if (Auth::user()->interests->isNotEmpty())
                                            @foreach (Auth::user()->interests as $interest)
                                                <div class="input-group mt-2" id="interest-{{ $interest->id }}">
                                                    <input type="text" class="form-control" name="interests[]"
                                                        value="{{ $interest->interest }}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeInterest({{ $interest->id }})">Eliminar</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <input type="text" class="form-control" name="interests[]"
                                                placeholder="Agregar interés">
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
    </div>

    <script>
        function addSkill() {
            var skillList = document.getElementById('skill-list');
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mt-2';
            newInputGroup.innerHTML =
                '<input type="text" class="form-control" name="skills[]"><div class="input-group-append"><button type="button" class="btn btn-danger" onclick="removeInput(this)">Eliminar</button></div>';
            skillList.appendChild(newInputGroup);
        }

        function addExperience() {
            var experienceList = document.getElementById('experience-list');
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mt-2';
            newInputGroup.innerHTML =
                '<input type="text" class="form-control" name="experiences[]"><div class="input-group-append"><button type="button" class="btn btn-danger" onclick="removeInput(this)">Eliminar</button></div>';
            experienceList.appendChild(newInputGroup);
        }

        function addEducation() {
            var educationList = document.getElementById('education-list');
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mt-2';
            newInputGroup.innerHTML =
                '<input type="text" class="form-control" name="educations[]"><div class="input-group-append"><button type="button" class="btn btn-danger" onclick="removeInput(this)">Eliminar</button></div>';
            educationList.appendChild(newInputGroup);
        }

        function addInterest() {
            var interestList = document.getElementById('interest-list');
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mt-2';
            newInputGroup.innerHTML =
                '<input type="text" class="form-control" name="interests[]"><div class="input-group-append"><button type="button" class="btn btn-danger" onclick="removeInput(this)">Eliminar</button></div>';
            interestList.appendChild(newInputGroup);
        }

        function removeInput(button) {
            var inputGroup = button.parentElement.parentElement;
            inputGroup.parentElement.removeChild(inputGroup);
        }

        function removeSkill(id) {
            var skillDiv = document.getElementById('skill-' + id);
            skillDiv.parentElement.removeChild(skillDiv);
        }

        function removeExperience(id) {
            var experienceDiv = document.getElementById('experience-' + id);
            experienceDiv.parentElement.removeChild(experienceDiv);
        }

        function removeEducation(id) {
            var educationDiv = document.getElementById('education-' + id);
            educationDiv.parentElement.removeChild(educationDiv);
        }

        function removeInterest(id) {
            var interestDiv = document.getElementById('interest-' + id);
            interestDiv.parentElement.removeChild(interestDiv);
        }
    </script>
@endsection
