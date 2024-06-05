<?php $__env->startSection('content'); ?>
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <div class="social-line">
                                <img src="<?php echo e(asset('img/logo.svg')); ?>" alt="">
                            </div>
                            <h4 class="card-title"><strong><?php echo e(__('Iniciar Sesión')); ?></strong></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-description text-center"></p>
                            <div class="bmd-form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">person</i>
                                        </span>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="<?php echo e(__('Nombre de usuario o Email...')); ?>" value="<?php echo e(old('email', null)); ?>" required autocomplete="email" autofocus>
                                </div>
                                <?php if($errors->has('email')): ?>
                                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="bmd-form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?> mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(__('Contraseña...')); ?>" required autocomplete="current-password">
                                </div>
                                <?php if($errors->has('password')): ?>
                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-check mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember me')); ?>

                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-info btn-link btn-lg"><?php echo e(__('Iniciar Sesión')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', ['class' => 'off-canvas-sidebar', 'activePage' => 'iniciarSesion', 'title' => __('dashboard')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/login.blade.php ENDPATH**/ ?>