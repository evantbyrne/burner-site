<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - API'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>API</h3>
	<hr class="line" />

	<p>
		<select id="version">
			<?php foreach($all_versions as $v): ?>
				
				<option data-url="<?= url("api/{$v->name}"); ?>"<?php if($v->name === $version->name): ?> selected<?php endif; ?>>Version <?= e($v->name); ?></option>

			<?php endforeach; ?>
		</select>
	</p>

	<ul class="padded">
		
		<?php foreach($classes as $c): ?>
			
			<li>&bull; <a href="<?= url("api/$version_name/{$c->dotted_name()}"); ?>"><?= e($c->name); ?></a></li>
		
		<?php endforeach; ?>

	</ul>

	<script src="<?= url('static/admin/js/jquery.min.js'); ?>"></script>
	<script>
	$(function() {

		$('#version').val('Version <?= e($version->name); ?>').attr('selected', true);
		$('#version').change(function() {
			
			window.location = $(this).find(':selected').attr('data-url');

		});

	});
	</script>
	
<?php $this->end_extend(); ?>