<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
	<div>
		<form action="<?php echo e(route('Settings.update')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<label for="siteName">Edit your site name</label>
			<input id="siteName" name="siteName" type="text" value="<?php echo e($settings->name); ?>">
			<label for="conNumber">Edit your contact number</label>
			<input id="conNumber" name="contactNumber" type="text" value="<?php echo e($settings->contact_number); ?>">
			<label for="conAddress">Edit your address</label>
			<input id="conAddress" name="contactAddress" type="text" value="<?php echo e($settings->contact_address); ?>">
			<label for="email">Edit your email</label>
			<input id="email" name="email" type="email" value="<?php echo e($settings->email); ?>">
			<button type="submit"> Confirm Edit</button>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>