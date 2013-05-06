<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<div class="tagline">
		<h2>The best of frameworks and content management systems combined.</h2>
		<a class="buy" href="<?= url('order'); ?>">Buy Now &mdash; 75% Off For Beta!</a>
	</div>

	<div class="grid">

		<div class="item">
			<h3>Simple</h3>
			<p>Getting a site setup is quick and easy for any developer familiar with the
				MVC design pattern. Don't take our word for it though; go check out the
				first <a target="_blank" href="http://bekr.me/burner-tutorial">tutorial</a>.</p>
		</div>
		<div class="item">
			<h3>Made for Data</h3>
			<p>At the core of all Burner applications lies our innovative ORM. Once you
				specify your table schema using a simple syntax, then that data is instantly
				manageable in the admin.</p>
		</div>
		<div class="item end">
			<h3>Extensible</h3>
			<p>Burner comes with a lot of standard features, but it does so without
				sacrificing extensibility. Everything from the authentication system to the
				admin control panel is customizable.</p>
		</div>
		<div class="item">
			<h3>Powerful</h3>
			<p>Calling Burner a CMS just doesn't do it justice. In reality, it's a full-featured
				framework that comes with an admin control panel right out of the box.</p>
		</div>
		<div class="item">
			<h3>Documented</h3>
			<p>Unlike most commercial software, Burner is fully documented. In addition to the
				easy-to-follow guides, the entire <a href="<?= url('api'); ?>">API</a> is
				documented as well.</p>
		</div>
		<div class="item end">
			<h3>Beta Deal</h3>
			<p>Support Burner while it's in beta and save <em>at least</em> 75%. Additionally,
				if you purchase a site license now, then you will have unlimited access to
				future updates.</p>
		</div>

		<div class="clear"></div>

	</div>
	
<?php $this->end_extend(); ?>