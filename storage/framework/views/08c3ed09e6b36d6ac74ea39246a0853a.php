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
                            
                            <li class="page-item <?php echo e($users->onFirstPage() ? 'disabled' : ''); ?>">
                                <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" aria-label="Previous">
                                    &laquo;
                                </a>
                            </li>

                            
                            <?php for($i = 1; $i <= $users->lastPage(); $i++): ?>
                                <li class="page-item <?php echo e($i == $users->currentPage() ? 'active' : ''); ?>">
                                    <a class="page-link" href="<?php echo e($users->url($i)); ?>"><?php echo e($i); ?></a>
                                </li>
                                <?php endfor; ?>

                                
                                <li
                                    class="page-item <?php echo e($users->currentPage() == $users->lastPage() ? 'disabled' : ''); ?>">
                                    <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', ['activePage' => 'users', 'titlePage' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/users/index.blade.php ENDPATH**/ ?>