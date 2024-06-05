<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item<?php echo e($activePage == 'inicio' ? ' active' : ''); ?>">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link">
                        <i class="material-icons">arrow_back</i> <?php echo e(__('volver')); ?>

                    </a>
                </li>
                
                <li class="nav-item<?php echo e($activePage == 'iniciarSesion' ? ' active' : ''); ?>">
                    <a href="<?php echo e(route('login')); ?>" class="nav-link">
                        <i class="material-icons">person</i> <?php echo e(__('Iniciar Sesión')); ?>

                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/layouts/navbars/navs/guest.blade.php ENDPATH**/ ?>