<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Register'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Registration Success</h3>
	<hr class="line" />
	
	<p>Your account has been created. Check your e-mail for the <em>temporary</em> password that we sent you!</p>

	<?php if($redirect !== false): ?>
		<p><a class="btn" href="<?= url(base64_decode($redirect)); ?>">Continue</a></p>
	<?php endif; ?>

<?php $this->end_extend(); ?>