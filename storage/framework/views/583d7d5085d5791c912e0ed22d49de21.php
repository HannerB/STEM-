<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <!-- head -->
        <?php echo $__env->make('dashboard.layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- head --> 
        <?php echo $__env->yieldContent('css'); ?>
    </head>

    <body class="<?php echo e($class ?? ''); ?>">
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0"
                style="display:none;visibility:hidden">
            </iframe>
        </noscript>
        <div class="wrapper ">
            <?php if(auth()->guard()->guest()): ?>
            <?php echo $__env->make('dashboard.layouts.page_templates.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <?php echo $__env->make('dashboard.layouts.page_templates.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="main-area">
                <div class="container portada">
                    
                </div>
            </div>
            <div class="menu-fader"></div>
            <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
        </div>
        <!-- script -->
        <?php echo $__env->make('dashboard.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- script -->
        <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard.blade.php ENDPATH**/ ?>