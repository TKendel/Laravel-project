<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($settings->name); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/frontEnd.css">   
</head>

<body>
    <header>
        <div class="jumbotron">
            <div class="container">
                <h2 class="display-2"><?php echo e($settings->name); ?></h2>
                <nav>
                    <ul class="nav justify-content-center">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><?php echo e($category->type); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <div class="container article-Main">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article>
                    <div class="thumbnail">
                        <img src="<?php echo e(asset($latest_post->thumbnail)); ?>" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="<?php echo e(route('single',['slug'=>$latest_post->slug])); ?>"><?php echo e($latest_post->title); ?></a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left"><?php echo e($latest_post->created_at->toFormattedDateString()); ?> 
                                </time>
                            </span>
                            <a href=""><?php echo e($latest_post->Category->type); ?></a>
                        </div>
                    </div>
                </article>   
            </div>
            <div class="col-lg-2"></div>      
        </div>
    
        <div class="row">
            <div class="col-lg-6">
                <article>
                    <div class="thumbnail">
                        <img src="<?php echo e(asset($second_post->thumbnail)); ?>" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="<?php echo e(route('single',['slug'=>$second_post->slug])); ?>"><?php echo e($second_post->title); ?></a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left"><?php echo e($second_post->created_at->toFormattedDateString()); ?> 
                                </time>
                            </span>
                            <a href=""><?php echo e($second_post->Category->type); ?></a>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-6">
                <article>
                    <div class="thumbnail">
                        <img src="<?php echo e(asset($third_post->thumbnail)); ?>" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="<?php echo e(route('single',['slug'=>$third_post->slug])); ?>"><?php echo e($third_post->title); ?></a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left"><?php echo e($third_post->created_at->toFormattedDateString()); ?> 
                                </time>
                            </span>
                            <a href=""><?php echo e($third_post->Category->type); ?></a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-3"><?php echo e($New_category->type); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $New_category->Posts()->orderBy("created_at","desc")->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $New_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div>
                                <img src="<?php echo e(asset($New_post->thumbnail)); ?>" height="100" width="150">
                            </div>
                            <div>
                                <h4><?php echo e($New_post->title); ?></h4>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>                  
            </div>
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-3"><?php echo e($Programing_category->type); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $Programing_category->Posts()->orderBy("created_at","desc")->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $New_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div>
                                <img src="<?php echo e(asset($New_post->thumbnail)); ?>" height="100" width="150">
                            </div>
                            <div>
                                <h4><?php echo e($New_post->title); ?></h4>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make("includes/footer", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--scripts-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
