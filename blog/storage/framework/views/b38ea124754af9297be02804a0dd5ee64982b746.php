<?php $__env->startSection('title','Post'); ?>

<?php $__env->startPush('css'); ?>
    <!-- Bootstrap Select Css -->
    <link href="<?php echo e(asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="<?php echo e(route('author.post.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            AÑADIR NUEVO POST
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="title">
                                        <label class="form-label">Título del post</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    <input type="file" name="image">
                                </div>

                            <div class="form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Publicar</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            Categorías y etiquetas
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line <?php echo e($errors->has('categories') ? 'focused error' : ''); ?>">
                                    <label for="category">Selecciona la categoría</label>
                                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line <?php echo e($errors->has('tags') ? 'focused error' : ''); ?>">
                                    <label for="tag">Selecciona la etiqueta</label>
                                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="<?php echo e(route('author.post.index')); ?>">ATRÁS</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ACTUALIZAR</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               POST
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="body"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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