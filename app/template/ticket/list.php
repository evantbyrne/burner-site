<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Issue Tracker'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Issue Tracker</h3>

	<?php if(!empty($tickets)): ?>

		<?php if($open): ?>
			<p>Showing all open tickets. <a href="<?= url('support/ticket/closed'); ?>">View closed</a>.</p>
		<?php else: ?>
			<p>Showing all closed tickets. <a href="<?= url('support/ticket'); ?>">View open</a>.</p>
		<?php endif; ?>

		<p><a class="btn btn-primary" href="<?= url('support/ticket/create'); ?>">Create Ticket</a></p>

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

		<?php if($open): ?>
			<p>No open tickets found. <a href="<?= url('support/ticket/closed'); ?>">View closed</a>.</p>
		<?php else: ?>
			<p>No closed tickets found. <a href="<?= url('support/ticket'); ?>">View open</a>.</p>
		<?php endif; ?>

		<p><a class="btn btn-primary" href="<?= url('support/ticket/create'); ?>">Create Ticket</a></p>

	<?php endif; ?>
	
<?php $this->end_extend(); ?>