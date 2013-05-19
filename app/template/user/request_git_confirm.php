<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Git Access Confirmed'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Git Access Confirmed</h3>
	<hr class="line" />
	
	<p>You just confirmed that git access has been given to <strong><?= e($email); ?></strong></p>

<?php $this->end_extend(); ?>