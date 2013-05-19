<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Request Git Access'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Request Git Access</h3>
	<hr class="line" />
	
	<form method="post" class="form-horizontal">

		<?php if(isset($errors['email'])): ?>
			<p><label><?= $errors['email']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>E-mail</label>
			<input type="email" name="email" value="<?= e($email); ?>" required />
		</p>
		
		<input type="submit" value="Submit" class="btn btn-primary" />

	</form>

<?php $this->end_extend(); ?>