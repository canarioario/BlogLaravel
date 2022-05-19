<?php $__env->startSection('title','Post'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="<?php echo e(route('author.post.index')); ?>" class="btn btn-danger waves-effect">ATRÁS</a>
        <?php if($post->is_approved == false): ?>
            <button type="button" class="btn btn-danger waves-effect pull-right" disabled>
                <span>Pendiente</span>
            </button>
        <?php else: ?>
            <button type="button" class="btn btn-success waves-effect pull-right" disabled>
                <i class="material-icons">done</i>
                <span>Aprobado</span>
            </button>
        <?php endif; ?>
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <?php echo e($post->title); ?>

                                <small>Creado por <strong> <a href=""><?php echo e($post->user->name); ?></a></strong> on <?php echo e($post->created_at->toFormattedDateString()); ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo $post->body; ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                            Categorías
                            </h2>
                        </div>
                        <div class="body">
                            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label bg-cyan"><?php echo e($category->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Etiquetas
                            </h2>
                        </div>
                        <div class="body">
                            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label bg-green"><?php echo e($tag->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header bg-amber">
                            <h2>
                               Imagen
                            </h2>
                        </div>
                        <div class="body">
                            <img class="img-responsive thumbnail" src="<?php echo e(url('/storage/post')); ?>/<?php echo e($post->image); ?>" alt="">
                        </div>
                    </div>

                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <!-- Select Plugin Js -->
    <script src="<?php echo e(asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <!-- TinyMCE -->
    <script src="<?php echo e(asset('assets/backend/plugins/tinymce/tinymce.js')); ?>"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?php echo e(asset('assets/backend/plugins/tinymce')); ?>';
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>