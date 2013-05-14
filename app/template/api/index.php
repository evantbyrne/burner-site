<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - API'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>API</h3>
	<hr class="line" />

	<ul class="padded">
		
		<?php foreach($classes as $c): ?>
			
			<li>&bull; <a href="<?= url("api/{$version->name}/{$c->dotted_name()}"); ?>"><?= e($c->name); ?></a></li>
		
		<?php endforeach; ?>

	</ul>
	
<?php $this->end_extend(); ?>