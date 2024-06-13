<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Noticias</h4>
                        <p class="card-category">Noticias registradas</p>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="<?php echo e(route('news.create')); ?>" class="btn btn-sm btn-facebook">Añadir Noticia</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="text-info">
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Imagen</th>
                                    <th>Fecha de la noticia</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acciones</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->title); ?></td>
                                            <td>
                                                <?php if($item->images): ?>
                                                    <img src="<?php echo e(asset($item->images->url)); ?>" alt="<?php echo e($item->slug); ?>" style="max-width: 100px;">
                                                <?php else: ?>
                                                    <span>No hay imagen principal</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->date_of_the_new_story); ?></td>
                                            <td>
                                                <span class="badge <?php echo e($item->state == 1 ? 'badge-success' : 'badge-danger'); ?>">
                                                    <?php echo e($item->state == 1 ? 'Activo' : 'Inactivo'); ?>

                                                </span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a href="<?php echo e(route('news.show', $item->id)); ?>" class="btn btn-info" title="Ver detalles"><i class="material-icons">person</i></a>
                                                <a href="<?php echo e(route('news.edit', $item->id)); ?>" class="btn btn-warning" title="Editar"><i class="material-icons">edit</i></a>
                                                <?php if($item->state == 1): ?>
                                                    <form action="<?php echo e(route('news.deactivate', $item->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de desactivar esta noticia?')" style="display: inline-block;">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" rel="tooltip" class="btn btn-danger" title="Desactivar">
                                                            <i class="material-icons">visibility_off</i>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <form action="<?php echo e(route('news.activate', $item->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de activar esta noticia?')" style="display: inline-block;">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" rel="tooltip" class="btn btn-success" title="Activar">
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
                        <div class="card-footer text-right">
                            <ul class="pagination">
                                
                                <?php if($news->hasPages()): ?>
                                    
                                    <?php if(!$news->onFirstPage()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($news->previousPageUrl()); ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                    <?php endif; ?>
                        
                                    
                                    <?php $__currentLoopData = $news->getUrlRange(1, $news->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($page == 1 || $page == $news->lastPage() || ($page >= max(1, $news->currentPage() - 1) && $page <= min($news->lastPage(), $news->currentPage() + 1))): ?>
                                            <li class="page-item <?php echo e($page == $news->currentPage() ? 'active' : ''); ?>">
                                                <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                            </li>
                                        <?php elseif($page == 2 && $news->currentPage() > 3): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">&hellip;</span>
                                            </li>
                                        <?php elseif($page == $news->lastPage() - 1 && $news->currentPage() < $news->lastPage() - 2): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">&hellip;</span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                    
                                    <?php if($news->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($news->nextPageUrl()); ?>">&raquo;</a>
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', ['activePage' => 'news', 'titlePage' => 'Noticias'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/news/index.blade.php ENDPATH**/ ?>