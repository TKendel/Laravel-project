<?php $__env->startSection('content'); ?>
	<h1>Users</h1>
	<table class="table">
		<thead>
			<tr>
				<th>
					Avatar
				</th>
				<th>
					Name
				</th>
				<th>
					Premissions
				</th>
				<th>
					Delete
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if($allUsers->count()>0): ?>
				<?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<img src="<?php echo e(asset($user->profile->avatar)); ?>" height="75" width="75">
					</td>
					<td>
						<p><?php echo e($user->name); ?></p>
					</td>
					<td>
						<?php if($user->admin): ?>
							<a href="<?php echo e(route('User.removeAdmin',['id'=>$user->id])); ?>"><button style="margin-left: 5px;">Remmove premisions
							</button></a>
						<?php else: ?>
							<a href="<?php echo e(route('User.admin',['id'=>$user->id])); ?>"><button style="margin-left: 5px;">Make admin
							</button></a>
						<?php endif; ?>
					</td>
					<td>
						<?php if(Auth::id() !== $user->id): ?>
						<a href="<?php echo e(route('User.destroy',['id'=>$user->id])); ?>"><button style="margin-left: 5px;">Delete</button></a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				<tr>
					<td>No posts as off now</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>