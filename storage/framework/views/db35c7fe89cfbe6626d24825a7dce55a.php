<section class="news-section">

    <header class="heading-area">
        <div class="row">
            <div class="col-sm-8">
                <h2>
                    <p>
                        <strong>Noticias.</strong>
                        Entérate de lo más reciente
                    </p>
                </h2>
            </div>
            <div class="col-sm-3">
                <a href="<?php echo e(route('home.news')); ?>" class="link-more">
                    Noticias
                </a>
            </div>
        </div>
    </header>

    <div class="news-area">
        <div class="row">
            <div class="col-lg-8">
                <!--news-block-->
                <div class="news-block hidden-xs">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="items-list">
        <!-- 5/7 NEWS - FIRST COL ONE NEW -->
        <?php $__currentLoopData = $news->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <figure class="info-item">
                <div class="img">
                    <a href="<?php echo e(route('home.show', ['slug' => Str::slug($item->slug)])); ?>">
                        <img src="<?php echo e(asset($item->url)); ?>"  class="img-responsive attachment-medium size-medium wp-post-image" alt="<?php echo e($item->slug); ?>" loading="lazy" srcset="<?php echo e(asset($item->url)); ?> 768w, <?php echo e(asset($item->url)); ?> 1920w" sizes="(max-width: 768px) 100vw, 768px" />
                    </a>
                </div>
                <figcaption>
                    <div class="block">
                        <h3>
                            <a href="<?php echo e(route('home.show', ['slug' => Str::slug($item->slug)])); ?>">
                                <?php echo e($item->title); ?> </a>
                        </h3>
                        <p><?php echo e($item->description); ?></p>

                    </div>
                </figcaption>
            </figure>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</section><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/home/news/index.blade.php ENDPATH**/ ?>