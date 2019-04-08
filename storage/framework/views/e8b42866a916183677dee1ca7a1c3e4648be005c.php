<?php $__env->startSection('content'); ?>
	<h1>Nintendo</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Category
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if($categories->count()>0): ?>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<p><?php echo e($category->type); ?></p>
					</td>
					<td>
						<?php if(auth::check()): ?>
						<a href="<?php echo e(route('Category.edit',['id'=>$category->id])); ?>"><button style="margin-left: 5px;">Edit</button></a>
						<?php endif; ?>
					</td>
					<td>
						<?php if(auth::check()): ?>
						<a href="<?php echo e(route('Category.destroy',['id'=>$category->id])); ?>"><button style="margin-left: 5px;">Delete</button></a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				<tr>
					<td>No categories as off now</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>