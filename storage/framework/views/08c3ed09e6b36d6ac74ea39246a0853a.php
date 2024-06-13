<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Usuarios</h4>
                        <p class="card-category">Usuarios registrados</p>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-facebook">Añadir usuario</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-info">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Rol</th>
                                    <th class="text-right">Acciones</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <?php if($user->url): ?>
                                                <img src="<?php echo e(asset($user->url)); ?>" alt="<?php echo e($user->name); ?>" style="max-width: 100px;">
                                            <?php else: ?>
                                                <i class="material-icons" style="font-size: 50px;">person</i>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge <?php echo e($user->state == 1 ? 'badge-success' : 'badge-danger'); ?>">
                                                <?php echo e($user->state == 1 ? 'Activo' : 'Inactivo'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if($user->role): ?>
                                                <span class="badge badge-info">
                                                    <?php echo e($user->role->name); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">
                                                    No roles
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('users.show', $user->id)); ?>" class="btn btn-info"><i
                                                    class="material-icons">person</i></a>
                                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning"><i
                                                    class="material-icons">edit</i></a>
                                            <?php if($user->state == 1): ?>
                                            <form action="<?php echo e(route('users.deactivate', $user->id)); ?>" method="POST"
                                                onsubmit="return confirm('¿Estás seguro?')"
                                                style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">visibility_off</i>
                                                </button>
                                            </form>
                                            <?php else: ?>
                                            <form action="<?php echo e(route('users.activate', $user->id)); ?>" method="POST"
                                                onsubmit="return confirm('¿Estás seguro?')"
                                                style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <ul class="pagination">
                            
                            <?php if($users->hasPages()): ?>
                                
                                <?php if(!$users->onFirstPage()): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                <?php endif; ?>
                    
                                
                                <?php $__currentLoopData = $users->getUrlRange(1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($page == 1 || $page == $users->lastPage() || ($page >= max(1, $users->currentPage() - 1) && $page <= min($users->lastPage(), $users->currentPage() + 1))): ?>
                                        <li class="page-item <?php echo e($page == $users->currentPage() ? 'active' : ''); ?>">
                                            <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                        </li>
                                    <?php elseif($page == 2 && $users->currentPage() > 3): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">&hellip;</span>
                                        </li>
                                    <?php elseif($page == $users->lastPage() - 1 && $users->currentPage() < $users->lastPage() - 2): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">&hellip;</span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                                
                                <?php if($users->hasMorePages()): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>">&raquo;</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>                                                                                                                     
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', ['activePage' => 'users', 'titlePage' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/users/index.blade.php ENDPATH**/ ?>