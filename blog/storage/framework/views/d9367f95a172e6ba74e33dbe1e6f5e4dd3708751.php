<?php $__env->startSection('title'); ?>
<?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('assets/frontend/css/single-post/styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/css/single-post/responsive.css')); ?>" rel="stylesheet">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;
            background-image: url(<?php echo e(url('/storage/post')); ?>/<?php echo e($post->image); ?>);
            background-size: auto 400px;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="header-bg">
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="<?php echo e(url('/storage/profile')); ?>/<?php echo e($post->user->image); ?>" alt="Profile Image"></a>
                                </div>                                       

                                <div class="middle-area">
                                    <a class="name" href="#"><b><?php echo e($post->user->name); ?></b></a>
                                    <h6 class="date">on <?php echo e($post->created_at->diffForHumans()); ?></h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b><?php echo e($post->title); ?></b></a></h3>

                            <div class="para">
                                <?php echo html_entity_decode($post->body); ?>

                            </div>

                            <ul class="tags">
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('tag.posts',$tag->slug)); ?>"><?php echo e($tag->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <a href="javascript:void(0);" onclick="toastr.info('Para a??adir a favoritos, debes estar registrado.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>
                                    <?php else: ?>
                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($post->id); ?>').submit();"
                                           class="<?php echo e(!Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>

                                        <form id="favorite-form-<?php echo e($post->id); ?>" method="POST" action="<?php echo e(route('post.favorite',$post->id)); ?>" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    <?php endif; ?>

                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i><?php echo e($post->comments->count()); ?></a></li>
                                <li><a href="#"><i class="ion-eye"></i><?php echo e($post->view_count); ?></a></li>
                            </ul>

                            <ul class="icons">
                                <li>COMPARTIR : </li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>SOBRE EL AUTOR</b></h4>
                            <p><?php echo e($post->user->about); ?></p>
                        </div>

                        <div class="tag-area">

                            <h4 class="title"><b>CATEGORIAS</b></h4>
                            <ul>
                                <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('category.posts',$category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $randomposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $randompost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="<?php echo e(url('/storage/post')); ?>/<?php echo e($randompost->image); ?>" alt="<?php echo e($randompost->title); ?>"></div>
                                                                
                                <a class="avatar" href="#"><img src="<?php echo e(url('/storage/profile')); ?>/<?php echo e($randompost->user->image); ?>" alt="Profile Image"></a>
                                                                            
                                <div class="blog-info">

                                    <h4 class="title"><a href="<?php echo e(route('post.details',$randompost->slug)); ?>"><b><?php echo e($randompost->title); ?></b></a></h4>

                                    <ul class="post-footer">

                                        <li>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <a href="javascript:void(0);" onclick="toastr.info('Para a??adir a favoritos, debes estar registrado.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i><?php echo e($randompost->favorite_to_users->count()); ?></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($randompost->id); ?>').submit();"
                                                   class="<?php echo e(!Auth::user()->favorite_posts->where('pivot.post_id',$randompost->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>

                                                <form id="favorite-form-<?php echo e($randompost->id); ?>" method="POST" action="<?php echo e(route('post.favorite',$randompost->id)); ?>" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            <?php endif; ?>

                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i><?php echo e($randompost->comments->count()); ?></a></li>
                                        <li><a href="#"><i class="ion-eye"></i><?php echo e($randompost->view_count); ?></a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>COMENTARIOS</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        <?php if(auth()->guard()->guest()): ?>
                            <p>Para comentar el post, debes estar registrado. <a href="<?php echo e(route('login')); ?>">Iniciar sesi??n</a></p>
                        <?php else: ?>
                            <form method="post" action="<?php echo e(route('comment.store',$post->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="Escribe tu comentario" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>COMENTAR</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        <?php endif; ?>
                    </div><!-- comment-form -->

                    <h4><b>COMENTARIOS(<?php echo e($post->comments()->count()); ?>)</b></h4>
                    <?php if($post->comments->count() > 0): ?>
                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="commnets-area ">

                                <div class="comment">

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#"><img src="<?php echo e(url('/storage/profile')); ?>/<?php echo e($comment->user->image); ?>" alt="Profile Image"></a>
                                        </div>                                    

                                        <div class="middle-area">
                                            <a class="name" href="#"><b><?php echo e($comment->user->name); ?></b></a>
                                            <h6 class="date">on <?php echo e($comment->created_at->diffForHumans()); ?></h6>
                                        </div>

                                    </div><!-- post-info -->

                                    <p><?php echo e($comment->comment); ?></p>

                                </div>

                            </div><!-- commnets-area -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No hay comentarios todav??a. S?? el primero. :)</p>
                    </div>
                    </div>

                    <?php endif; ?>

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>