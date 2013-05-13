<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Order'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Thank You!</h3>
	<hr class="line" />

	<p>Thank you for your purchase. You may now download Burner CMS from
		the link below. Also, after activating your burnercms.com account,
		you may log into your dashboard and download Burner CMS from there
		at any time.</p>

	<p><a class="btn btn-info" href="<?= url('order/download'); ?>">Download Burner</a></p>

<?php $this->end_extend(); ?>