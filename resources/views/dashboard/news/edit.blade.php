@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Editar Noticia'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.update', $news) }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="updateForm">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Noticia</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $news->title) }}" autofocus>
                                        @if ($errors->has('title'))
                                            <span class="error text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" id="description" name="description">{{ old('description', $news->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="error text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" id="content" name="content">{{ old('content', $news->content) }}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="error text-danger"
                                                for="input-content">{{ $errors->first('content') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Nueva Imagen</label>
                                    <div class="col-sm-7">
                                        <div id="dropzoneEditNews" class="dropzone form-group"></div>
                                        @error('url')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la
                                        noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control form-group" id="date_of_the_new_story" name="date_of_the_new_story"
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
        @if(isset($news))
            var news = <?php echo json_encode($news); ?>;
        @endif

        Dropzone.autoDiscover = false;

        // Verificar si Dropzone está adjunto antes de inicializarlo
        if (!document.getElementById("dropzoneEditNews").classList.contains("dz-clickable")) {
            var dropzoneEditNews = new Dropzone("#dropzoneEditNews", {
                url: "{{ route('news.update', isset($news) ? $news->id : '') }}",
                method: "PUT",
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

                    document.querySelector("#updateForm button[type=submit]").addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        dropzoneEditNews.processQueue();
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
                                title: 'Noticia actualizada exitosamente.',
                                showConfirmButton: false,
                                timer: 1500 // Duración del mensaje en milisegundos
                            }).then(() => {
                                window.location.href = "{{ route('news.show', isset($news) ? $news->id : '') }}";
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
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error al subir la imagen'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection