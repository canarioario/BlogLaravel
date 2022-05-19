<?php $__env->startSection('title','Comments'); ?>

<?php $__env->startPush('css'); ?>
    <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        TODOS LOS COMENTARIOS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                <th class="text-center">Información comentarios</th>
                                    <th class="text-center">Información post</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                <th class="text-center">Información comentarios</th>
                                    <th class="text-center">Información post</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="<?php echo e(url('/storage/profile')); ?>/<?php echo e($comment->user->image); ?>" width="64" height="64">
                                                        </a>  
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo e($comment->user->name); ?> <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
                                                        </h4>
                                                        <p><?php echo e($comment->comment); ?></p>
                                                        <a target="_blank" href="<?php echo e(route('post.details',$comment->post->slug.'#comments')); ?>">Contestar</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="<?php echo e(route('post.details',$comment->post->slug)); ?>">
                                                            <img class="media-object" src="<?php echo e(url('/storage/post')); ?>/<?php echo e($comment->post->image); ?>" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a target="_blank" href="<?php echo e(route('post.details',$comment->post->slug)); ?>">
                                                            <h4 class="media-heading"><?php echo e(str_limit($comment->post->title,'40')); ?></h4>
                                                        </a>
                                                        <p>by <strong><?php echo e($comment->post->user->name); ?></strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect" onclick="deleteComment(<?php echo e($comment->id); ?>)">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-<?php echo e($comment->id); ?>" method="POST" action="<?php echo e(route('author.comment.destroy',$comment->id)); ?>" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backend/js/pages/tables/jquery-datatable.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteComment(id) {
            swal({
                itle: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'No, cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelado',
                        'Tus datos están guardados :)',
                        'error'
                    )
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>