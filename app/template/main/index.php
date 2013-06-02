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
				first <a href="<?= url('guide/tutorial-photo-gallery'); ?>">tutorial</a>.</p>
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
				easy-to-follow <a href="<?= url('guide'); ?>">guides</a>, the entire <a href="<?= url('api'); ?>">API</a> is
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

	<div class="sub-tagline">

		<h3>1. Define Models</h3>
		<pre class="prettyprint lang-php">namespace App\Model;

class Photo extends \Core\Model\Base {
	
	/**
	 * @option type = Image
	 * @option required = Image field is required.
	 */
	public $image;

	/**
	 * @option type = Varchar
	 * @option length = 100
	 * @option required = Title field is required.
	 */
	public $title;

	/**
	 * @option type = Text
	 */
	public $description;

	/**
	 * Image Path
	 * @return string
	 */
	public function image_path() {

		return "static/photo/{$this->id}";

	}

}</pre>

		<h3>2. Enable Admin</h3>
		<pre class="prettyprint lang-php">Config::set('admin_models', array(
	'Users' =&gt; array('user', 'group', 'membership'),
	'Gallery' =&gt; array('photo')
);</pre>

		<h3>3. Manage</h3>
		<img class="full" src="<?= url('static/tutorial/list.png'); ?>" />

	</div>

	<div class="tagline">
		<a class="buy" href="<?= url('order'); ?>">Buy Now &mdash; 75% Off For Beta!</a>
	</div>
	
<?php $this->end_extend(); ?>