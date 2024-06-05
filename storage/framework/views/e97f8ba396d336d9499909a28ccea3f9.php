<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <!-- head -->
        <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- head -->
        <?php echo $__env->yieldContent('css'); ?>
    </head>

    <body data-rsssl=1 class="page-template page-template-templates page-template-portada page-template-templatesportada-php page page-id-21">
        <?php echo $__env->yieldContent('body'); ?>
    </body>

    <!-- script -->
    <?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <!-- script -->
    <?php echo $__env->yieldContent('js'); ?>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/app.blade.php ENDPATH**/ ?>