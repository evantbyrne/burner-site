<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Support'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Support</h3>
	<hr class="line" />

	<h3>Issue Tracker</h3>
	<p>If you have a bug to report, then this is the place to go. You can also
		request new features or suggest optimizations here.</p>

	<p><a class="btn" target="_blank" href="https://github.com/evantbyrne/burner-issues/issues?state=open">Issue Tracker</a></p>
	<hr/>

	<h3>E-Mail</h3>
	<p>If you have questions or concerns, please feel free to e-mail us directly at
		<a href="mailto:<?= EMAIL; ?>">burnercms@gmail.com</a>. You may also
		contact us on <a target="_blank" href="https://twitter.com/burnercms">Twitter</a>
		if you would like. However, for lengthier requests it's best to contact us via
		e-mail.</p>

	<p><a class="btn" href="mailto:<?= EMAIL; ?>">E-Mail Us</a></p>
	
<?php $this->end_extend(); ?>