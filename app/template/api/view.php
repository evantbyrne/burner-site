<?php $this->base('base'); ?>


<!-- Title -->
<?php $this->set('title', 'Burner CMS - API: ' . e($api_class->name)); ?>


<!-- Content -->
<?php $this->extend('content'); ?>

	<h3><?= e($api_class->name); ?></h3>
	<hr class="line" />

	<?php if(!empty($api_class->description)): ?>

		<p><?= e($api_class->description); ?></p>

	<?php endif; ?>


	<h3 id="methods">Methods</h3>
	<hr class="line" />

	<?php if(!empty($api_methods)): ?>

		<?php foreach($api_methods as $m): ?>
			<div class="api" id="method:<?= e($m->name); ?>">
				<h3>
					<span class="kwd"><?= $m->publicity() . (($m->is_static) ? ' static' : ''); ?> function</span>
					<span class="pln"><?= e($m->name); ?>()</span>
				</h3>

				<?php $tags = $m->get_tags(); ?>
				<?php if(!empty($tags)): ?>

					<h4>Tags</h4>
					<ul>

						<?php foreach($tags as $t): ?>

							<li>
								<span class="typ">@<?= e($t[0]); ?></span>
								<span class="pln"><?= e($t[1]); ?></span>
							</li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

				<?php $params = $m->get_parameters(); ?>
				<?php if(!empty($params)): ?>

					<h4>Parameters</h4>
					<ul>

						<?php foreach($params as $p): ?>

							<li>

								<?php if($p['required']): ?>
									<span class="label">required</span>
								<?php endif; ?>

								<span class="typ">$<?= e($p['name']); ?></span>

								<?php if($p['has_default']): ?>
									<span class="pln">= <?= e(json_encode(unserialize($p['default']))); ?></span>
								<?php endif; ?>
								
							</li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</div>

		<?php endforeach; ?>

	<?php endif; ?>


	<h3 id="properties">Properties</h3>
	<hr class="line" />

	<?php if(!empty($api_properties)): ?>

		<?php foreach($api_properties as $p): ?>
			<div class="api" id="property:<?= e($p->name); ?>">
				<h3>
					<span class="kwd"><?= $p->publicity() . (($p->is_static) ? ' static' : ''); ?></span>
					<span class="pln">$<?= e($p->name); ?></span>
				</h3>

				<?php $tags = $p->get_tags(); ?>
				<?php if(!empty($tags)): ?>

					<h4>Tags</h4>
					
					<ul>

						<?php foreach($tags as $t): ?>

							<li>
								<span class="typ">@<?= e($t[0]); ?></span>
								<span class="pln"><?= e($t[1]); ?></span>
							</li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</div>

		<?php endforeach; ?>

	<?php endif; ?>
	
<?php $this->end_extend(); ?>