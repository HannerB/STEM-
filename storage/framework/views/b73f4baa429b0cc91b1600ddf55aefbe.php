<div class="main-area">
    <div class="container portada">
        <!-- NOTICIAS SECTION-->
        <?php echo $__env->make('home.news.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end news-section -->
        <!-- AGENDA SECTION-->
        <?php echo $__env->make('home.agenda', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end events-Agenda -->
        <!-- BANNERS SECTION-->
        <?php echo $__env->make('home.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end banners-section -->
        <!-- INFO SECTION-->
        <?php echo $__env->make('layouts.info.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end info-section -->
    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/layouts/page_template.blade.php ENDPATH**/ ?>