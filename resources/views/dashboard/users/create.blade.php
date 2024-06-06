@extends('dashboard', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('users.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="userForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Usuario</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                                        @error('username')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                        @error('password')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                                        @error('password_confirmation')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <div id="dropzoneUser" class="dropzone"></div>
                                        @error('url')
                                            <span class="error text-danger" id="error-url">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="role_id" class="col-sm-2 col-form-label">Roles</label>
                                    <div class="col-sm-7">
                                        <select id="role_id" name="role_id" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        Dropzone.autoDiscover = false;

        if (!document.getElementById("dropzoneUser").classList.contains("dz-clickable")) {
            var dropzoneUser = new Dropzone("#dropzoneUser", {
                url: "{{ route('users.store') }}",
                paramName: "url",
                maxFilesize: 5, // Tamaño máximo en MB
                acceptedFiles: 'image/*',
                dictDefaultMessage: "Haz clic o arrastra y suelta los archivos aquí para subirlos",
                dictFallbackText: "Por favor utiliza el formulario de reserva para subir tus archivos como en los viejos tiempos.",
                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                dictCancelUpload: "Cancelar subida",
                dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta subida?",
                dictRemoveFile: "Eliminar archivo",
                dictMaxFilesExceeded: "No puedes subir más archivos.",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                autoProcessQueue: false,
                addRemoveLinks: true,
                init: function() {
                    var myDropzone = this;

                    document.querySelector("#userForm").addEventListener("submit", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });

                    this.on("sending", function(file, xhr, formData) {
                        formData.append("name", document.getElementById("name").value);
                        formData.append("username", document.getElementById("username").value);
                        formData.append("email", document.getElementById("email").value);
                        formData.append("password", document.getElementById("password").value);
                        formData.append("password_confirmation", document.getElementById("password_confirmation").value);
                    });

                    this.on("success", function(file, response) {
                        alert(response.success);
                        if (response.success) {
                            window.location.href = response.redirect;
                        }
                    });

                    this.on("error", function(file, response) {
                        if (typeof response.message !== "undefined") {
                            alert(response.message);
                        } else {
                            alert("Error al subir la imagen");
                        }
                    });
                } 
            });
        }
    </script>
@endsection