<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Log In'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Log In</h3>

	<hr class="line" />
	
	<form method="post" class="form-horizontal">

		<?php if($invalid): ?><p>Invalid login credentials.</p><?php endif; ?>

		<?php if(isset($errors['email'])): ?>
			<p><label><?= $errors['email']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>E-mail</label>
			<input type="email" name="email" value="<?= e($user->email); ?>" required />
		</p>

		<?php if(isset($errors['password'])): ?>
			<p><label><?= $errors['password']; ?></label></p>
		<?php endif; ?>
		<p>
			<label>Password</label>
			<input type="password" name="password" required />
		</p>
		
		<input type="submit" value="Login" class="btn btn-primary" />

	</form>

<?php $this->end_extend(); ?>