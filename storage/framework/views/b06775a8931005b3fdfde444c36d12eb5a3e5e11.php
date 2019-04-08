<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div>
	<form action="<?php echo e(route( 'tag.store' )); ?>" method="post">
		<?php echo e(csrf_field()); ?>

		<label for="tag">Name of your tag</label>
		<input id="tag" type="text" name="tag">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>