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
                                            <img src="<?php echo e(asset($item->url)); ?>" class="img-responsive attachment-medium size-medium wp-post-image" alt="<?php echo e($item->slug); ?>" srcset="<?php echo e(asset($item->url)); ?> 768w, <?php echo e(asset($item->url)); ?> 1920w, <?php echo e(asset($item->url)); ?> 1536w, <?php echo e(asset($item->url)); ?> 2048w" sizes="(max-width: 768px) 100vw, 768px" />
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
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                
                                <li class="page-item <?php echo e($news->onFirstPage() ? 'disabled' : ''); ?>">
                                    <a class="page-link" href="<?php echo e($news->previousPageUrl()); ?>" aria-label="Previous">
                                        &laquo;
                                    </a>
                                </li>
                        
                                
                                <?php for($i = 1; $i <= $news->lastPage(); $i++): ?>
                                    <li class="page-item <?php echo e($i == $news->currentPage() ? 'active' : ''); ?>">
                                        <a class="page-link" href="<?php echo e($news->url($i)); ?>"><?php echo e($i); ?></a>
                                    </li>
                                <?php endfor; ?>
                        
                                
                                <li class="page-item <?php echo e($news->currentPage() == $news->lastPage() ? 'disabled' : ''); ?>">
                                    <a class="page-link" href="<?php echo e($news->nextPageUrl()); ?>" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                            </ul>
                        </nav>
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