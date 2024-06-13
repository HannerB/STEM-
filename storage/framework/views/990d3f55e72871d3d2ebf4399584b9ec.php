<?php $__env->startSection('body'); ?>
    <div id="wrapper">
        <?php echo $__env->make('layouts.navbars.mega-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <form method="POST" action="<?php echo e(route('users.update', Auth::user()->id)); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <!-- Campos del formulario -->
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo e(Auth::user()->name); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Usuario</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?php echo e(Auth::user()->username); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo e(Auth::user()->email); ?>" required>
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
                                        <?php if(Auth::user()->url): ?>
                                            <div class="mt-2">
                                                <img src="<?php echo e(Auth::user()->url); ?>" alt="Imagen de perfil"
                                                    class="img-thumbnail" width="150">
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Nota</label>
                                        <textarea class="form-control" id="note" name="note" rows="3"><?php echo e(Auth::user()->note); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="position">Posición</label>
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="<?php echo e(Auth::user()->position); ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="area">Área</label>
                                        <input type="text" name="area" id="area" class="form-control"
                                            value="<?php echo e(Auth::user()->area); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Número de Teléfono</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            value="<?php echo e(Auth::user()->phone_number); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter_link">Link de Twitter</label>
                                        <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                            value="<?php echo e(Auth::user()->twitter_link); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_link">Link de Facebook</label>
                                        <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                            value="<?php echo e(Auth::user()->facebook_link); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin_link">Link de LinkedIn</label>
                                        <input type="url" name="linkedin_link" id="linkedin_link"
                                            class="form-control" value="<?php echo e(Auth::user()->linkedin_link); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin_link">Universidad</label>
                                        <input type="text" name="college" id="college"
                                            class="form-control" value="<?php echo e(Auth::user()->college); ?>">
                                    </div>


                                    <!-- Mostrar skills -->
                                    <div class="form-group">
                                        <label for="skills">Habilidades</label>
                                        <?php if(Auth::user()->skills->isNotEmpty()): ?>
                                            <?php $__currentLoopData = Auth::user()->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="input-group mt-2" id="skill-<?php echo e($skill->id); ?>">
                                                    <input type="text" class="form-control" name="skills[]"
                                                        value="<?php echo e($skill->skill); ?>">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeSkill(<?php echo e($skill->id); ?>)">Eliminar</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="skills[]"
                                                placeholder="Agregar habilidad">
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addSkill()">Agregar habilidad</button>
                                        <div id="skill-list"></div>
                                    </div>

                                    <!-- Mostrar experiences -->
                                    <div class="form-group">
                                        <label for="experience">Experiencias</label>
                                        <?php if(Auth::user()->experiences->isNotEmpty()): ?>
                                            <?php $__currentLoopData = Auth::user()->experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="input-group mt-2" id="experience-<?php echo e($experience->id); ?>">
                                                    <input type="text" class="form-control" name="experiences[]"
                                                        value="<?php echo e($experience->experience); ?>">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeExperience(<?php echo e($experience->id); ?>)">Eliminar</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="experiences[]"
                                                placeholder="Agregar experiencia">
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addExperience()">Agregar experiencia</button>
                                        <div id="experience-list"></div>
                                    </div>

                                    <!-- Mostrar educations -->
                                    <div class="form-group">
                                        <label for="education">Educación</label>
                                        <?php if(Auth::user()->educations->isNotEmpty()): ?>
                                            <?php $__currentLoopData = Auth::user()->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="input-group mt-2" id="education-<?php echo e($education->id); ?>">
                                                    <input type="text" class="form-control" name="educations[]"
                                                        value="<?php echo e($education->education); ?>">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeEducation(<?php echo e($education->id); ?>)">Eliminar</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="educations[]"
                                                placeholder="Agregar educación">
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addEducation()">Agregar educación</button>
                                        <div id="education-list"></div>
                                    </div>

                                    <!-- Mostrar interests -->
                                    <div class="form-group">
                                        <label for="interest">Intereses</label>
                                        <?php if(Auth::user()->interests->isNotEmpty()): ?>
                                            <?php $__currentLoopData = Auth::user()->interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="input-group mt-2" id="interest-<?php echo e($interest->id); ?>">
                                                    <input type="text" class="form-control" name="interests[]"
                                                        value="<?php echo e($interest->interest); ?>">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeInterest(<?php echo e($interest->id); ?>)">Eliminar</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="interests[]"
                                                placeholder="Agregar interés">
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary mt-2"
                                            onclick="addInterest()">Agregar interés</button>
                                        <div id="interest-list"></div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="<?php echo e(route('CardsProfes')); ?>" class="btn btn-secondary">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/entreprofes/info.blade.php ENDPATH**/ ?>