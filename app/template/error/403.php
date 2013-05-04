<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Access Denied'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>
	
	<h3>Access denied</h3>
	
	<p>You do not have permission to access this resource.</p>

<?php $this->end_extend(); ?>