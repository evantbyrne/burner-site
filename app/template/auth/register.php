<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Register'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Register</h3>
	<hr class="line" />
	
	<form method="post" class="form-horizontal">

		<?php if(isset($errors['email'])): ?>
			<p><label><?= $errors['email']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>E-mail</label>
			<input type="email" name="email" value="<?= e($email); ?>" required />
		</p>

		<?php if(isset($errors['display_name'])): ?>
			<p><label><?= $errors['display_name']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>Display Name</label>
			<input type="text" name="display_name" value="<?= e($display_name); ?>" required />
		</p>
		
		<input type="submit" value="Register" class="btn btn-primary" />

	</form>

<?php $this->end_extend(); ?>