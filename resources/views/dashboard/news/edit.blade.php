@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Editar Noticia'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.update', $news->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="newsForm">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Noticia</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese el Título" value="{{ old('title', $news->title) }}" autofocus>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-group" name="description" id="description" placeholder="Ingrese la Descripción">{{ old('description', $news->description) }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-group" name="content" id="content" placeholder="Ingrese el Contenido">{{ old('content', $news->content) }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <div id="dropzoneNews" class="dropzone form-group">
                                            @if ($news->url)
                                                <div class="form-group mt-3"></div>
                                            @endif
                                        </div>
                                        @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" name="date_of_the_new_story" id="date_of_the_new_story" placeholder="Ingrese la Fecha de la Noticia" value="{{ old('date_of_the_new_story', date('Y-m-d\TH:i', strtotime($news->date_of_the_new_story))) }}">
                                        @error('date_of_the_new_story')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

        $(document).ready(function() {
            // Verifica si el dropzone ya está inicializado para evitar duplicaciones
            if (!document.getElementById("dropzoneNews").classList.contains("dz-clickable")) {
                var dropzoneNews = new Dropzone("#dropzoneNews", {
                    url: "{{ route('news.update', $news->id) }}",
                    paramName: "images",
                    maxFilesize: 5, // Tamaño máximo en MB
                    acceptedFiles: 'image/*',
                    dictDefaultMessage: "Arrastra y suelta los archivos aquí o haz clic para subir.",
                    dictFallbackMessage: "Tu navegador no soporta arrastrar y soltar archivos para subir.",
                    dictInvalidFileType: "No puedes subir archivos de este tipo.",
                    dictCancelUpload: "Cancelar subida",
                    dictRemoveFile: "Eliminar archivo",
                    dictMaxFilesExceeded: "No puedes subir más archivos.",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    init: function() {
                        this.on("error", function(file, message) {
                            $('#images-error').text(message);
                            this.removeFile(file);
                        });

                        this.on("success", function(file, response) {
                            console.log(response);
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
                                    text: response.message, // Mostrar el mensaje de error específico
                                    showConfirmButton: true,
                                });
                            }
                        });
                    }
                });

                // Evitar múltiples envíos del formulario por Dropzone
                $('#newsForm').submit(function(e) {
                    e.preventDefault();
                    dropzoneNews.processQueue();
                });
            }
        });
    </script>
@endsection