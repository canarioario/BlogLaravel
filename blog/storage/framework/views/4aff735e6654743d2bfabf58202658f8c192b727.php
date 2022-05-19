<?php $__env->startSection('title','Tag'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                          EDITAR ETIQUETA
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?php echo e(route('admin.tag.update',$tag->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" value="<?php echo e($tag->name); ?>">
                                    <label class="form-label">Nombre de la etiqueta</label>
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="<?php echo e(route('admin.tag.index')); ?>">ATRÁS</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ACTUALIZAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>