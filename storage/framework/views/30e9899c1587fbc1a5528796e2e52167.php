<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(route('news.update', $news)); ?>" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
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
                                            value="<?php echo e(old('title', $news->title)); ?>" autofocus>
                                        <?php if($errors->has('title')): ?>
                                            <span class="error text-danger"><?php echo e($errors->first('title')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" name="description"><?php echo e(old('description', $news->description)); ?></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <span class="error text-danger"><?php echo e($errors->first('description')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control form-group" name="content"><?php echo e(old('content', $news->content)); ?></textarea>
                                        <?php if($errors->has('content')): ?>
                                            <span class="error text-danger"
                                                for="input-content"><?php echo e($errors->first('content')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Nueva Imagen</label>
                                    <div class="col-sm-7">
                                        <div id="myDropzone" class="dropzone"></div>
                                        <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="error text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la
                                        noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" name="date_of_the_new_story"
                                            value="<?php echo e(old('date_of_the_new_story', $news->date_of_the_new_story)); ?>">
                                        <?php if($errors->has('date_of_the_new_story')): ?>
                                            <span
                                                class="error text-danger"><?php echo e($errors->first('date_of_the_new_story')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-info">Actualizar</button>
                                <a href="<?php echo e(route('news.index')); ?>" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        Dropzone.autoDiscover = false;

        // Inicializa Dropzone buscando el elemento por su clase ".dropzone"
        var myDropzone = new Dropzone(".dropzone", {
            url: "<?php echo e(route('news.update', $news)); ?>",
            paramName: "url",
            maxFilesize: 5, // Tamaño máximo en MB
            acceptedFiles: 'image/*',
            dictDefaultMessage: "Haz clic o arrastra y suelta los archivos aquí para subirlos",
            dictCancelUpload: "Cancelar subida",
            dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta subida?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puedes subir más archivos.",
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
                    window.location.href = "<?php echo e(route('news.index')); ?>"; // Redirige a la página de índice de noticias
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', ['activePage' => 'news', 'titlePage' => 'Editar Noticia'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/news/edit.blade.php ENDPATH**/ ?>