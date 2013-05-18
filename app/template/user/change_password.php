<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Change Password'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Change Password</h3>
	<hr class="line" />

	<form method="post" class="form-horizontal">

		<?php if($error): ?>
			<p>Passwords didn't match. Please try again.</p>
		<?php elseif($success): ?>
			<p>Your password has been changed.</p>
		<?php endif; ?>

		<p>
			<label>New Password</label>
			<input type="password" name="password" required />
		</p>

		<p>
			<label>Confirm New Password</label>
			<input type="password" name="password_confirmation" required />
		</p>
		
		<input type="submit" value="Save" class="btn btn-primary" />

	</form>

<?php $this->end_extend(); ?>