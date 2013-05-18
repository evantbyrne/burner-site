<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Log In'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Log In</h3>
	<hr class="line" />

	<p>This action requires that you to have a burnercms.com account.<br/>
		When you are done here we'll direct you back to where you came from.</p>
	
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
	<hr/>

	<h3>Register</h3>
	<hr class="line" />

	<p>Don't have an account yet? Then <a href="<?= url(($redirect !== false) ? "auth/register/$redirect" : 'auth/register'); ?>">create one</a>.</p>

<?php $this->end_extend(); ?>