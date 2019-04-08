<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div>
	<form action="<?php echo e(route( 'Profile.update' )); ?>" method="post" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		<label for="Username">Username</label>
		<input id="Username" type="text" name="Username" value="<?php echo e($currentUser->name); ?>">
		<label for="email">Email</label>
		<input id="email" type="email" name="email" value="<?php echo e($currentUser->email); ?>">
		<label for="password">Password</label>
		<input id="password" type="password" name="password">
		<label for="avatar">Upload new avatar</label>
		<input id="avatar" type="file" name="avatar">
		<label for="link">Linked in profile</label>
		<input id="link" type="url" name="link" value="<?php echo e($currentUser->profile->link); ?>">
		<label for="about">About you</label>
		<textarea name="about" id="about"><?php echo e($currentUser->profile->about); ?></textarea>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>