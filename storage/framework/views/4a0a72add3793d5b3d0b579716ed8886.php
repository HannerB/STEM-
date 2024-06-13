<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-info">
    <div class="container-fluid">
        <div class="navbar-wrapper">

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Buscar...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            <?php echo e(__('Account')); ?>

                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#"><?php echo e(__('Mi Perfil')); ?></a>
                        <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Administar WEB')); ?></a>
                        <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><?php echo e(__('Cerrar sesión')); ?></a>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>