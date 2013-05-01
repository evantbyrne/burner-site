<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - Guides'); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3>Guides</h3>

	<hr class="line" />

	<?php foreach($columns as $i => $categories): ?>

		<div class="column<?php if($i === 3) { echo ' end'; } ?>">

			<?php foreach($categories as $name => $guides): ?>

				<?php if(!empty($guides)): ?>

					<h3><?= e($name); ?></h3>

					<ul class="block">

						<?php foreach($guides as $guide): ?>

							<li><a href="<?= url("guide/{$guide->url}"); ?>"><?= e($guide->title); ?></a></li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>

	<?php endforeach; ?>

	<div class="clear"></div>
	
<?php $this->end_extend(); ?>