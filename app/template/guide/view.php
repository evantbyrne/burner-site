<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', $title); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3><?= e($guide->title); ?></h3>
	<hr class="line" />

	<?= $guide->content; ?>
	
<?php $this->end_extend(); ?>