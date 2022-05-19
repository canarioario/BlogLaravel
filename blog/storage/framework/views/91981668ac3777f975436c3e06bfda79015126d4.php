<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset('/favicon.png')); ?>">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <!-- Stylesheets -->

    <link href="<?php echo e(asset('assets/frontend/css/bootstrap.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/frontend/css/swiper.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/frontend/css/ionicons.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body>

<?php echo $__env->make('layouts.frontend.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.frontend.partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- SCIPTS -->
<script src="<?php echo e(asset('assets/frontend/js/jquery-3.1.1.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/frontend/js/tether.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/frontend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/scripts.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php echo Toastr::message(); ?>

<script>
    <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    toastr.error('<?php echo e($error); ?>','Error',{
        closeButton:true,
        progressBar:true,
    });
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
