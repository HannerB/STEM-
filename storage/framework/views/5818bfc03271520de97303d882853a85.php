<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('layouts.navbars.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <figure class="main-banner type4">
        <figcaption>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1 class="heading cat">Emprende</h1>
                    </div>
                </div>
            </div>
        </figcaption>
    </figure><!-- end main-banner -->
    <div class="main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="article-section type2">
                        <!-- cat loop -->
                        <div class="search-results">
                            <ul>
                                <?php $__currentLoopData = $news->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <figure class="img">
                                        <a class="" href="<?php echo e(route('home.show', ['slug' => Str::slug($item->slug)])); ?>">
                                            <img src="<?php echo e(asset($item->images->url)); ?>" class="img-responsive attachment-medium size-medium wp-post-image" alt="<?php echo e($item->slug); ?>" srcset="<?php echo e(asset($item->images->url)); ?> 768w, <?php echo e(asset($item->images->url)); ?> 1920w, <?php echo e(asset($item->images->url)); ?> 1536w, <?php echo e(asset($item->images->url)); ?> 2048w" sizes="(max-width: 768px) 100vw, 768px" />
                                        </a>
                                    </figure>
                                    <time datetime="<?php echo e($item->date_of_the_new_story); ?>">
                                        <?php echo e(\Carbon\Carbon::parse($item->date_of_the_new_story)->translatedFormat('j, M Y')); ?>

                                    </time>
                                    <div class="right-block">
                                        <strong class="cat-name">Emprende</strong>
                                        <h3>
                                            <a href="<?php echo e(route('home.show', ['slug' => Str::slug($item->slug)])); ?>">
                                                <?php echo e($item->title); ?>

                                            </a>
                                        </h3>
                                        <p><?php echo e($item->description); ?>&#8230;</p>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div><?php if($news->lastPage() > 1): ?>
                        <?php
                            $visiblePages = 10; // Define el número deseado de páginas visibles en el rango medio
                            $halfVisible = floor($visiblePages / 2); // Calcula la mitad del número de páginas visibles
                            $startPage = max(1, $news->currentPage() - $halfVisible); // Calcula la página inicial del rango medio
                            $endPage = min($news->lastPage(), $startPage + $visiblePages - 1); // Calcula la página final del rango medio
                            
                            // Ajusta el rango si el número total de páginas es menor que el número deseado
                            if ($news->lastPage() < $visiblePages) {
                                $startPage = 1;
                                $endPage = $news->lastPage();
                            } else {
                                // Si la página actual está cerca del principio, ajusta el inicio del rango
                                if ($news->currentPage() <= $halfVisible + 1) {
                                    $startPage = 1;
                                    $endPage = min($visiblePages, $news->lastPage());
                                }
                                // Si la página actual está cerca del final, ajusta el final del rango
                                elseif ($news->currentPage() >= $news->lastPage() - $halfVisible) {
                                    $startPage = max(1, $news->lastPage() - $visiblePages + 1);
                                    $endPage = $news->lastPage();
                                }
                            }
                            
                            $ellipsisStart = $startPage > 1;
                            $ellipsisEnd = $endPage < $news->lastPage();
                        ?>
                    
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                
                                <?php if($news->currentPage() > 1): ?>
                                    <li class="prev"><a href="<?php echo e($news->previousPageUrl()); ?>"><span>&laquo;</span></a></li>
                                <?php endif; ?>
                                
                                
                                <?php if($ellipsisStart): ?>
                                    <li><a href="<?php echo e(route('home.paginate', ['page' => 1])); ?>">1</a></li>
                                    <?php if($startPage > 2): ?>
                                        <li class="points">...</li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                                
                                <?php for($i = $startPage; $i <= $endPage; $i++): ?>
                                    <li class="<?php echo e($i == $news->currentPage() ? 'active' : ''); ?>"><a href="<?php echo e(route('home.paginate', ['page' => $i])); ?>"><?php echo e($i); ?></a></li>
                                <?php endfor; ?>
                                
                                
                                <?php if($ellipsisEnd): ?>
                                    <?php if($endPage < $news->lastPage() - 1): ?>
                                        <li class="points">...</li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('home.paginate', ['page' => $news->lastPage()])); ?>"><?php echo e($news->lastPage()); ?></a></li>
                                <?php endif; ?>
                                
                                
                                <?php if($news->currentPage() < $news->lastPage()): ?>
                                    <li class="next"><a href="<?php echo e($news->nextPageUrl()); ?>"><span>&raquo;</span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav> 
                    <?php endif; ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    </div><!-- end article-section -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end main-area -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="menu-fader"></div>
    <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', ['activePage' => 'noticias', 'titlePage' => __('EMPRENDE')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/home/news/news.blade.php ENDPATH**/ ?>