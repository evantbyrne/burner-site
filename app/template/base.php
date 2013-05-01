<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />

		<title><?php $this->section('title'); ?>Burner CMS<?php $this->end_section(); ?></title>

		<link rel="stylesheet" type="text/css" href="<?= url('static/style/style.css'); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>

		<!--[if lt IE 9]>
			<script>
				document.createElement('header');
				document.createElement('nav');
				document.createElement('footer');
			</script>
		<![endif]-->

		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= url('static/style/tomorrow.css'); ?>" />
		<style type="text/css">
			pre.prettyprint {
				padding: 10px;
			}
		</style>

	</head>
	<body>

		<header>
			<nav>
				<h1><a href="<?= url(); ?>">burner</a></h1>

				<ul>
					<li><a class="active" href="<?= url('guide'); ?>">Guides</a></li>
					<li><a href="<?= url('api'); ?>">API</a></li>
					<li><a href="<?= url('support'); ?>">Support</a></li>
					<li><a href="<?= url('dashboard'); ?>">Log In</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="container">

			<?php $this->section('content'); ?>

				<!-- Default Content -->

			<?php $this->end_section(); ?>

		</div>

		<footer>&copy; <?= date('Y'); ?></footer>
		
	</body>
</html>