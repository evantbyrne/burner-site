<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', $title); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3><?php e($guide->title); ?></h3>

	<?= $guide->content; ?>
	
<?php $this->end_extend(); ?>