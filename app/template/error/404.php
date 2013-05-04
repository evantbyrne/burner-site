<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Page Not Found'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>
	
	<h3>Page not found</h3>
	
	<p>Sorry, the requested page could not be found.</p>

<?php $this->end_extend(); ?>