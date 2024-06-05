
<figure class="main-banner type2">
    <div class="wrapper wrapper-full-page">
        <?php echo $__env->make('dashboard.layouts.navbars.navs.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?php echo e(asset('img/emprende-futuro-768x327.jpg')); ?>'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</figure>
</div>
    <?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/layouts/page_templates/guest.blade.php ENDPATH**/ ?>