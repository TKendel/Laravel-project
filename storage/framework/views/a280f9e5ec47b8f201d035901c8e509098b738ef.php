<?php $__env->startSection('content'); ?>
	<h1>Nintendo</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Posts
				</th>
				<th>
					Restore
				</th>
				<th>
					Destroy
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if($allContent->count()>0): ?>
				<?php $__currentLoopData = $allContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<h3><?php echo e($data->title); ?></h3>
						<p><?php echo e($data->description); ?></p>
						<img src="<?php echo e($data->thumbnail); ?>" height="75" width="75">
					</td>
					<td>
						<?php if(auth::check()): ?>
						<a href="<?php echo e(route('Content.restore',['id'=>$data->id])); ?>"><button style="margin-left: 5px;">Restore</button></a>
						<?php endif; ?>
					</td>
					<td>
						<?php if(auth::check()): ?>
						<a href="<?php echo e(route('Content.kill',['id'=>$data->id])); ?>"><button style="margin-left: 5px;">Destroy</button></a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				<tr>
					<td>Trash is empty</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>