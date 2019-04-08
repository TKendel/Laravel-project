<?php $__env->startSection("content"); ?>

	<div class="SinglePost_Title">
		<h1><?php echo e($Post->title); ?></h1>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article>
                    <div class="thumbnail">
                        <img src="<?php echo e(asset($Post->thumbnail)); ?>" width="650" height="350">
                    </div>
                    <div class="Post_info">
                    	<div>
                    		admin
                    	</div>
                        <span>
                            <i class="seoicon-clock"></i>

                            <time class="text-sm-left"><?php echo e($Post->created_at->toFormattedDateString()); ?> 
                            </time>
                        </span>
                        <a href=""><?php echo e($Post->Category->type); ?></a>
                    </div>
                    <div>
                    	<p><?php echo $Post->description; ?></p>
                    </div>
                </article>   
            </div>
            <div class="col-lg-2"></div>   
		</div>
	</div>
	<div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-4">All Blog Tags</h2>
         					<?php $__currentLoopData = $Post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         						<a href="#"><?php echo e($tag->tag); ?></a>
         					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
           	</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <article>
                    
                </article>
                <div class="n_p_buttons">
                    <?php if($next): ?>
                        <div class="Next">
                            <a href="<?php echo e(route('single',['slug'=>$next->slug])); ?>">
                                
                                <div>
                                    <div>Next Post</div>
                                    <p><?php echo e($next->title); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($previous): ?>
                        <div class="Previous">
                            <a href="<?php echo e(route('single',['slug'=>$previous->slug])); ?>">
                                
                                <div>
                                    <div>Previous Post</div>
                                    <p><?php echo e($previous->title); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/frontend", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>