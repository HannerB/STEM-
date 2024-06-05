<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('news.store')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="newsForm">
                    <?php echo csrf_field(); ?>
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
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese el Título" value="<?php echo e(old('title')); ?>" autofocus>
                                    <?php if($errors->has('title')): ?>
                                    <span class="invalid-feedback" role="alert"><?php echo e($errors->first('title')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-group" name="description" id="description" placeholder="Ingrese la Descripción"><?php echo e(old('description')); ?></textarea>
                                    <?php if($errors->has('description')): ?>
                                    <span class="invalid-feedback" role="alert"><?php echo e($errors->first('description')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-group" name="content" id="content" placeholder="Ingrese el Contenido"><?php echo e(old('content')); ?></textarea>
                                    <?php if($errors->has('content')): ?>
                                    <span class="invalid-feedback" role="alert"><?php echo e($errors->first('content')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label for="url" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-7">
                                    <div id="myDropzone" class="dropzone"></div>
                                    <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="error text-danger" id="error-url"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la noticia</label>
                                <div class="col-sm-7">
                                    <input type="datetime-local" class="form-control" name="date_of_the_new_story" id="date_of_the_new_story" placeholder="Ingrese la Fecha de la Noticia" value="<?php echo e(old('date_of_the_new_story')); ?>">
                                    <?php if($errors->has('date_of_the_new_story')): ?>
                                    <span class="invalid-feedback" role="alert"><?php echo e($errors->first('date_of_the_new_story')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-info">Guardar</button>
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

        var myDropzone = new Dropzone("#myDropzone", {
            url: "<?php echo e(route('news.store')); ?>",
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
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
                    alert(response.success);
                    if (response.success) {
                        window.location.href = "<?php echo e(route('news.index')); ?>";
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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', ['activePage' => 'news', 'titlePage' => 'Nueva Noticia'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/news/create.blade.php ENDPATH**/ ?>