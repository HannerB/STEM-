@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Nueva Noticia'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('news.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="newsForm">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Noticia</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <!-- Campos del formulario aquí -->
                            <div class="row">
                                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese el Título" value="{{ old('title') }}" autofocus>
                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-group" name="description" id="description" placeholder="Ingrese la Descripción">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-group" name="content" id="content" placeholder="Ingrese el Contenido">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="url" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-7">
                                    <div id="dropzoneNews" class="dropzone form-group"></div>
                                    @error('url')
                                        <span class="error text-danger" id="error-url">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la noticia</label>
                                <div class="col-sm-7">
                                    <input type="datetime-local" class="form-control" name="date_of_the_new_story" id="date_of_the_new_story" placeholder="Ingrese la Fecha de la Noticia" value="{{ old('date_of_the_new_story') }}">
                                    @if ($errors->has('date_of_the_new_story'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('date_of_the_new_story') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-info">Guardar</button>
                            <a href="{{ route('news.index') }}" class="btn btn-danger">Cancelar</a>
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

        if (!document.getElementById("dropzoneNews").classList.contains("dz-clickable")) {
            var dropzoneNews = new Dropzone("#dropzoneNews", {
                url: "{{ route('news.store') }}",
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

                    document.querySelector("#newsForm button[type=submit]").addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });

                    this.on("sending", function(file, xhr, formData) {
                        formData.append("title", document.getElementById("title").value);
                        formData.append("description", document.getElementById("description").value);
                        formData.append("content", document.getElementById("content").value);
                        formData.append("date_of_the_new_story", document.getElementById("date_of_the_new_story").value);
                    });

                    this.on("success", function(file, response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Noticia creada exitosamente.',
                                showConfirmButton: false,
                                timer: 1500 // Duración del mensaje en milisegundos
                            }).then(() => {
                                window.location.href = "{{ route('news.show', ':id') }}".replace(':id', response.id);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al subir la imagen',
                                showConfirmButton: false,
                                timer: 1500 // Duración del mensaje en milisegundos
                            });
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