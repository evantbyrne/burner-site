<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Issue Tracker: Create Ticket'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Create Ticket</h3>
	<hr class="line" />

	<p><a class="btn" href="<?= url('support/ticket'); ?>">Issues Index</a></p>

	<form method="post">

		<?php if(isset($errors['title'])): ?>
			<p><label><?= $errors['title']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>Title</label>
			<input type="text" name="title" value="<?= e($title); ?>" required />
		</p>

		<?php if(isset($errors['ticket_type'])): ?>
			<p><label><?= $errors['ticket_type']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>Type</label>
			<select name="ticket_type">

				<?php foreach($ticket_types as $type): ?>

					<option value="<?= $type->id; ?>"<?php if($type->id == $ticket_type) { echo ' SELECTED'; } ?>><?= e($type->title); ?></option>

				<?php endforeach; ?>

			</select>
		</p>

		<?php if(isset($errors['content'])): ?>
			<p><label><?= $errors['content']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>Content</label>
			<textarea name="content"><?= $content; ?></textarea>
		</p>

		<p>Supports <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown</a>
			paragraphs, bold, italics, links, and code blocks. Indent code blocks with four spaces.</p>

		<p><input class="btn btn-primary" type="submit" value="Save" /></p>

	</form>
	
<?php $this->end_extend(); ?>