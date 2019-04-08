<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
	<div>
		<form action="<?php echo e(route('Content.update',['id'=>$RequestedPost->id] )); ?>" method="post" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<label for="TitleEdit">Edit your title</label>
			<input id="TitleEdit" name="title" type="text" value="<?php echo e($RequestedPost->title); ?>">
			<label for="DescEdit">Edit your Description</label>
			<textarea id="DescEdit" name="description"><?php echo e($RequestedPost->description); ?></textarea>
			<label for="Category">Select a cetegory</label>
			<select id="Category" name="category">
			<?php $__currentLoopData = $CategoryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($types->id); ?>"
					<?php if($RequestedPost->category_id == $types->id): ?>
						selected
					<?php endif; ?>
				><?php echo e($types->type); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<label>Select your tag</label>
			<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"
					<?php $__currentLoopData = $RequestedPost->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($tag->id == $t->id): ?>
							checked
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				><?php echo e($tag->tag); ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="file" name="thumbnail">
			<button type="submit"> Confirm Edit</button>
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
		  $('#DescEdit').summernote();
		});
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>