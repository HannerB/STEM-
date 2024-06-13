@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Crear Noticia'])

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
                            <p class="card-category">Ingrese los datos de la nueva noticia</p>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese el Título" value="{{ old('title') }}" autofocus required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" placeholder="Ingrese la Descripción" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="content" id="content" placeholder="Ingrese el Contenido" required>{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="images" class="col-sm-2 col-form-label">Imágenes</label>
                                <div class="col-sm-10">
                                    <div id="dropzoneNews" class="dropzone">
                                        <div class="fallback">
                                            <input type="file" name="images[]" multiple>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="images-error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la noticia</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" name="date_of_the_new_story" id="date_of_the_new_story" value="{{ old('date_of_the_new_story') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="button" class="btn btn-info" id="submitForm">Crear</button>
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
        if (!Dropzone.instances.length) { // Comprobación para asegurar que no haya instancias previas
            var dropzoneNews = new Dropzone("#dropzoneNews", {
                url: "{{ route('news.store') }}",
                paramName: "images",
                maxFilesize: 5, // Tamaño máximo de archivo en MB
                acceptedFiles: 'image/*', // Tipos de archivo permitidos
                autoProcessQueue: false, // No procesar archivos automáticamente
                parallelUploads: 10, // Número de archivos a subir simultáneamente
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function() {
                    var submitButton = document.querySelector("#submitForm");
                    var myDropzone = this; // Closure

                    submitButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (myDropzone.getQueuedFiles().length > 0) {
                            myDropzone.processQueue(); // Subir archivos
                        } else {
                            // No hay archivos en la cola, enviar formulario manualmente
                            document.querySelector("#newsForm").submit();
                        }
                    });

                    this.on("sendingmultiple", function(file, xhr, formData) {
                        // Añadir todos los campos del formulario a la solicitud
                        $("#newsForm").serializeArray().forEach(function(field) {
                            formData.append(field.name, field.value);
                        });
                    });

                    this.on("successmultiple", function(files, response) {
                        // Manejo de la respuesta exitosa
                        Swal.fire({
                            icon: 'success',
                            title: 'Noticia creada exitosamente.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('news.index') }}";
                        });
                    });

                    this.on("errormultiple", function(files, response) {
                        // Manejo de errores
                        $('#images-error').text(response.message || 'Error al subir las imágenes.');
                    });
                }
            });
        }
    });
</script>
@endsection
