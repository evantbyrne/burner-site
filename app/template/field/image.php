<?php if(!empty($value) and $model !== null and empty($errors[$field]) and isset($model->id)): ?>

	<?php $location = $model->{$field . '_url'}(); ?>

	<p><small>Choose new file to replace uploaded one:</small></p>
	<ul class="thumbnails">
		<li style="margin:0">
			<a href="<?= e($location); ?>" class="thumbnail">
				<img style="max-width:300px" src="<?= e($location); ?>" />
			</a>
		</li>
	</ul>

<?php endif; ?>

<p><input type="file" name="<?= $field; ?>" /></p>