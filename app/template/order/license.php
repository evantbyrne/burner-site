<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Order'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Purchase Burner CMS</h3>
	<hr/>

	<table class="table-bordered">
		<thead>
			<tr>
				<th>Package</th>
				<th>Price</th>
				<th>Site Licenses</th>
				<th>Git Access</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= e($license_type->name); ?></td>
				<td><?= e($license_type->price); ?></td>
				<td><?= e($license_type->quantity); ?></td>
				<td><i class="icon-<?= ($license_type->git_access) ? 'ok-sign' : 'remove-circle'; ?>"></i></td>
			</tr>
		</tbody>
	</table>

	<p>By purchasing you accept the Burner CMS <a target="_blank" href="<?= url('support/license'); ?>">license</a>.</p>

	<form method="post">
		<script
			src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
			data-key="<?= $stripe_public; ?>"
			data-amount="<?= ($license_type->price * 100); ?>"
			data-name="Burner CMS"
			data-description="<?= e($license_type->name); ?> Package">
		</script>
	</form>

	<?php if($error): ?>
		<p>Error: <?= $error; ?></p>
	<?php endif; ?>

<?php $this->end_extend(); ?>