<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Issue Tracker: Ticket #' . $ticket->id); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Ticket #<?= $ticket->id; ?>: <?= e($ticket->title); ?></h3>
	
	<?php if($is_admin): ?>
		<p><a class="btn" href="<?= url("admin/ticket/{$ticket->id}"); ?>">Edit</a></p>
	<?php else: ?>
		<hr/>
	<?php endif; ?>

	<table class="table-bordered">
		<thead>
			<tr>
				<th>Author</th>
				<th>Type</th>
				<th>Status</th>
				<th>Priority</th>
			</tr>
		</thead>
		<tbody>
			<tr>

				<td><a href="<?= url("user/{$ticket->user}"); ?>"><?= e($ticket->user_display_name); ?></a></td>
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
		</tbody>
	</table>

	<p><?= e($ticket->content); ?></p>

	<h3>Comments (<?= count($comments); ?>)</h3>

	<?php if(!empty($comments)): ?>

		<hr/>

		<table class="table-bordered">
			<thead>
				<tr>
					<th width="200">Author</th>
					<th>Comment</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($comments as $comment): ?>
					<tr>

						<td>
							<a href="<?= url("user/{$comment->user}"); ?>"><?= e($comment->user_display_name); ?></a><br/>
							<span class="timestamp"><?= $comment->post_timestamp; ?></span>
						</td>
						<td><?= e($comment->content); ?></td>

					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

	<?php else: ?>

		<p>No comments found.</p>

	<?php endif; ?>

	<h3>Reply</h3>
	<hr class="line" />

	<?php if(!$is_user): ?>
	
		<p>Please <a href="<?= url('auth/login/' . base64_encode("support/ticket/{$ticket->id}")); ?>">log in</a> to post a reply.</p>

	<?php else: ?>

		<form method="post">

			<?php if($error): ?>
				<p><label>Content field is required.</label></p>
			<?php endif; ?>
			<p>
				<label>Content</label>
				<textarea name="content"><?= $content; ?></textarea>
			</p>

			<p><input class="btn btn-primary" type="submit" value="Post" /></p>

		</form>

	<?php endif; ?>
	
<?php $this->end_extend(); ?>