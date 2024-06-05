<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Usuario</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo e(old('name', $user->name)); ?>" autofocus>
                                        <?php if($errors->has('name')): ?>
                                            <span class="error text-danger"
                                                for="input-name"><?php echo e($errors->first('name')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="username"
                                            value="<?php echo e(old('username', $user->username)); ?>">
                                        <?php if($errors->has('username')): ?>
                                            <span class="error text-danger"
                                                for="input-username"><?php echo e($errors->first('username')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo e(old('email', $user->email)); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <span class="error text-danger"
                                                for="input-email"><?php echo e($errors->first('email')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Ingrese la contraseña sólo en caso de modificarla">
                                        <?php if($errors->has('password')): ?>
                                            <span class="error text-danger"
                                                for="input-password"><?php echo e($errors->first('password')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" name="url" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" id="url" name="url" accept="image/*">
                                        <?php if($errors->has('url')): ?>
                                            <span class="error text-danger" for="input-url"><?php echo e($errors->first('url')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="profile">
                                                    <table class="table">
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="<?php echo e(route('users.index')); ?>"type="submit" class="btn  btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', ['activePage' => 'users', 'titlePage' => 'Editar usuario'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/users/edit.blade.php ENDPATH**/ ?>