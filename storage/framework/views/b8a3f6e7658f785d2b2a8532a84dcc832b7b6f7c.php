<?php $__env->startSection('content'); ?>

<!-- Za izradi categorija al samo trenutno -->
<form action="<?php echo e(route( 'Category.store' )); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<label for="title">Create a category</label>
	<input type="text" name="category">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>