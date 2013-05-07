<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Order'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Purchase Burner CMS</h3>
	<hr class="line" />

	<p>Get Burner now and save <em>at least</em> 75% off the full
		price. Plus, you get to support the continued development
		of a great piece of software!</p>

	<div class="pt pt-left">
		<div class="pt-title">Single</div>
		<div class="pt-price">$25</div>
		<ul class="pt-features">
			<li>1 Site License</li>
			<li>Access to all future versions</li>
			<li>Basic Support</li>
			<li>No DRM</li>
			<li>&nbsp;</li>
		</ul>
		<div class="pt-btn"><a class="btn btn-large" href="<?= url('order/license/1'); ?>">Purchase</a></div>
	</div>

	<div class="pt pt-middle">
		<div class="pt-title">First Class</div>
		<div class="pt-price">$30</div>
		<ul class="pt-features">
			<li>1 Site License</li>
			<li>1 User GIT Read Access</li>
			<li>Access to all future versions</li>
			<li>Basic Support</li>
			<li>No DRM</li>
			<li>&nbsp;</li>
		</ul>
		<div class="pt-btn"><a class="btn btn-large btn-success" href="<?= url('order/license/2'); ?>">Purchase</a></div>
	</div>

	<div class="pt pt-right">
		<div class="pt-title">Triple</div>
		<div class="pt-price">$65</div>
		<ul class="pt-features">
			<li>3 Site Licenses</li>
			<li>1 User GIT Read Access</li>
			<li>Access to all future versions</li>
			<li>Basic Support</li>
			<li>No DRM</li>
		</ul>
		<div class="pt-btn"><a class="btn btn-large" href="<?= url('order/license/3'); ?>">Purchase</a></div>
	</div>

	<div class="clear"></div>
	<hr/>

	<h3>No DRM</h3>
	<hr class="line" />
	<p>Burner CMS has a strict no DRM policy, which means that it does not include any software or code that
		is designed to limit your usage of it. We trust our customers, so that they can trust us as well.</p>
	<hr/>

	<h3>Future Versions</h3>
	<hr class="line" />
	<p>All beta license purchasers will be allowed to download and use future releases of Burner CMS.</p>
	<hr/>

	<h3>GIT Read Access</h3>
	<hr class="line" />
	<p>The "First Class" and "Triple" packages grant you read access to Burner CMS's development GIT repository, so
		that you can always be on top of the latest changes and additions.</p>
	<hr/>

	<h3>Site License</h3>
	<hr class="line" />
	<p>Each Burner CMS site license allows you one "live" installation in a production environment</p>
	<p><a class="btn" target="_blank" href="<?= url('support/license'); ?>">Read License</a></p>

<?php $this->end_extend(); ?>