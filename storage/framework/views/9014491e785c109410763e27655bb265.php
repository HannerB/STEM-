<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title><?php echo e(__('dashboard')); ?></title>
<link rel="icon" href="<?php echo e(asset('img/favicon-retina.png')); ?>" type="image/png">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/css/dropzone.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/css/material-dashboard.css?v=2.1.1')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/css/material-kit.min.css?v=2.0.7')); ?>"/>

<style>
    .dropzone {
        background-color: #fbfdff;
        border: 1px dashed #c0ccda;
        border-radius: 6px;
        padding: 60px;
        text-align: center;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .dropzone {
        box-shadow: 0px 2px 20px 0px #f2f2f2;
        border-radius: 10px;
    }
</style>
<?php echo $__env->yieldContent('css'); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/dashboard/layouts/css.blade.php ENDPATH**/ ?>