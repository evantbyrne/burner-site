<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Dashboard'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Dashboard</h3>
	<hr class="line" />

	<p>Here you can find all of the licenses that belong to this account (<?= e($user->email); ?>).</p>
	<p>
		<a class="btn" href="<?= url('user/change_password'); ?>">Change Password</a>
		<a class="btn" href="<?= url('order'); ?>">Get Licenses</a>

		<?php if(!empty($licenses)): ?>
			<a class="btn btn-info" href="<?= url('order/download'); ?>">Download Burner</a>
		<?php endif; ?>
	</p>

	<hr/>


	<h3>Orders</h3>
	<?php if(!empty($licenses)): ?>

		<hr/>
		<table class="table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Sale Price</th>
					<th>Licenses</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($licenses as $license): ?>

					<tr>
						<td><?= e($license->name); ?></td>
						<td><?= e($license->quantity); ?></td>
						<td>$<?= e($license->sale_price); ?></td>
						<td><?= date('j M, Y - g:ia', $license->sale_timestamp); ?></td>
					</tr>

				<?php endforeach; ?>

			</tbody>
		</table>

	<?php else: ?>

		<hr class="line" />
		<p>No registered licenses.</p>

	<?php endif; ?>

	<hr/>


	<h3>Git Access</h3>

	<?php if(!empty($gits)): ?>

		<hr/>
		<table class="table-bordered">
			<thead>
				<tr>
					<th>E-Mail</th>
					<th>Completed</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($gits as $git): ?>

					<tr>
						<td><?= e($git->email); ?></td>
						<td><i class="icon-<?= ($git->completed) ? 'ok-sign' : 'remove-circle'; ?>"></i></td>
					</tr>

				<?php endforeach; ?>

			</tbody>
		</table>
		<hr/>

	<?php endif; ?>

	<p>Git activations available to you: <?= e($available_git); ?></p>

	<?php if($available_git > 0): ?>
		<p><a class="btn" href="<?= url('user/request_git'); ?>">Request Access</a></p>
	<?php endif; ?>
	
<?php $this->end_extend(); ?>