<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Dashboard'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Dashboard</h3>
	<hr class="line" />

	<p>Here you can find all of the licenses that belong to this account (<?= e($user->email); ?>).</p>
	<p>
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


	<h3>Tickets</h3>
	<?php if(!empty($tickets)): ?>

		<hr/>
		<table class="table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th>Type</th>
					<th>Status</th>
					<th>Priority</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($tickets as $ticket): ?>

					<tr>
						<td><a href="<?= url("support/ticket/{$ticket->id}"); ?>"><?= e($ticket->title); ?></a></td>
						<td><?= e($ticket->type); ?></td>
						<td><?= e($ticket->status); ?></td>
						
						<?php if($ticket->priority === 'High'): ?>
							<td><span class="label label-important">High</span></td>
						<?php elseif($ticket->priority === 'Medium'): ?>
							<td><span class="label label-warning">Medium</span></td>
						<?php else: ?>
							<td><span class="label"><?= e($ticket->priority); ?></span></td>
						<?php endif; ?>
					</tr>

				<?php endforeach; ?>

			</tbody>
		</table>

	<?php else: ?>

		<hr class="line" />
		<p>No tickets posted.</p>

	<?php endif; ?>
	
<?php $this->end_extend(); ?>