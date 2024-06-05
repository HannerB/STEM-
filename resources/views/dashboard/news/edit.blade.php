@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Editar Noticia'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.update', $news) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Noticia</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $news->title) }}" autofocus>
                                        @if ($errors->has('title'))
                                            <span class="error text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" name="description">{{ old('description', $news->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="error text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" name="content">{{ old('content', $news->content) }}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="error text-danger"
                                                for="input-content">{{ $errors->first('content') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Nueva Imagen</label>
                                    <div class="col-sm-7">
                                        <div id="myDropzone" class="dropzone"></div>
                                        @error('url')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la
                                        noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" name="date_of_the_new_story"
                                            value="{{ old('date_of_the_new_story', $news->date_of_the_new_story) }}">
                                        @if ($errors->has('date_of_the_new_story'))
                                            <span
                                                class="error text-danger">{{ $errors->first('date_of_the_new_story') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-info">Actualizar</button>
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

        // Inicializa Dropzone buscando el elemento por su clase ".dropzone"
        var myDropzone = new Dropzone(".dropzone", {
            url: "{{ route('news.update', $news) }}",
            paramName: "url",
            maxFilesize: 5, // Tamaño máximo en MB
            acceptedFiles: 'image/*',
            dictDefaultMessage: "Haz clic o arrastra y suelta los archivos aquí para subirlos",
            dictCancelUpload: "Cancelar subida",
            dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta subida?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puedes subir más archivos.",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function() {
                var myDropzone = this;

                // Escucha el evento click del botón de envío del formulario
                document.querySelector("form").addEventListener("submit", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue(); // Procesa la cola de Dropzone al hacer clic en el botón de envío
                });

                // Se ejecuta antes de enviar el archivo al servidor
                this.on("sending", function(file, xhr, formData) {
                    // Adjunta los otros datos del formulario al formData
                    formData.append("title", document.getElementById("title").value);
                    formData.append("description", document.getElementById("description").value);
                    formData.append("content", document.getElementById("content").value);
                    formData.append("date_of_the_new_story", document.getElementById("date_of_the_new_story").value);
                });

                // Se ejecuta cuando la subida es exitosa
                this.on("success", function(file, response) {
                    alert(response.success); // Muestra un mensaje de éxito
                    window.location.href = "{{ route('news.index') }}"; // Redirige a la página de índice de noticias
                });

                // Se ejecuta en caso de error durante la subida
                this.on("error", function(file, response) {
                    if (typeof response.message !== "undefined") {
                        alert(response.message); // Muestra un mensaje de error si está definido en la respuesta
                    } else {
                        alert("Error al subir la imagen"); // Muestra un mensaje de error genérico
                    }
                });
            }
        });
    </script>
@endsection
