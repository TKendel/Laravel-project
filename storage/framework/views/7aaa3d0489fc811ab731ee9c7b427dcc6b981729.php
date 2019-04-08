<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div>
	<form action="<?php echo e(route( 'Content.store' )); ?>" method="post" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		<label for="title">The title of your post</label>
		<input type="text" name="title">
		<div>
		<label for="description">Information about your article</label>
		<textarea id="description" name="description"></textarea>
		</div>
		<input type="file" name="thumbnail">
		<label for="Category">Where do you belong</label>
		<select id="Category" name="category_id">
			<?php $__currentLoopData = $CategoryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($types->id); ?>"><?php echo e($types->type); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
		<label for="tags">Pick your tags</label>
			<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input id="tags" type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->tag); ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
	<script>
		$(document).ready(function() {
		  $('#description').summernote();
		});
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>