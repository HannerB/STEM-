<div class="sidebar" data-color="orange" data-background-color="pink" data-image="<?php echo e(asset('img/logo.svg')); ?>">
    <div class="logo p-3 pe-md-0">
        <a href="<?php echo e(route('home')); ?>" class="simple-text logo-normal">
            <img src="<?php echo e(asset('img/logo.svg')); ?>" alt="logo" >
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item<?php echo e($activePage == 'dashboard' ? ' active' : ''); ?>">
                <a class="nav-link" href="">
                    <i class="material-icons">dashboard</i>
                    <p><?php echo e(__('Dashboard')); ?></p>
                </a>
            </li>
            
                <li class="nav-item<?php echo e($activePage == 'users' ? ' active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                        <i class="material-icons">person</i>
                        <p>Usuarios</p>
                    </a>
                </li>
            

                <li class="nav-item<?php echo e($activePage == 'news' ? ' active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('news.index')); ?>">
                        <i class="material-icons">book</i>
                        <p><?php echo e(__('Noticias')); ?></p>
                    </a>
                </li>
                
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias_index')): ?>
                <li class="nav-item<?php echo e($activePage == 'categorias' ? ' active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">
                        <i class="material-icons">category</i>
                        <p><?php echo e(__('Categorias')); ?></p>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_index')): ?>
                <li class="nav-item<?php echo e($activePage == 'permissions' ? ' active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('permissions.index')); ?>">
                        <i class="material-icons">manage_accounts</i>
                        <p><?php echo e(__('Permisos')); ?></p>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_index')): ?>
                <li class="nav-item<?php echo e($activePage == 'roles' ? ' active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                        <i class="material-icons">supervisor_account</i>
                        <p><?php echo e(__('Roles')); ?></p>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>