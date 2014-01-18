<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />

		<title><?php $this->section('title'); ?>Burner CMS<?php $this->end_section(); ?></title>

		<link rel="stylesheet" type="text/css" href="<?= url('static/style/style.css?v=2'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?= url('static/style/bootstrap/css/bootstrap.min.css'); ?>" />
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="<?= url('static/style/burner.ico'); ?>" />

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

			textarea {
				width: 100%;
				height: 300px;
			}
		</style>

	</head>
	<body>

		<header>
			<nav>
				<h1><a href="<?= url(); ?>">burner</a></h1>

				<ul>
					<li><a <?php if(preg_match('/^guide/', CURRENT_PAGE)): ?>class="active" <?php endif; ?>href="<?= url('guide'); ?>">Guides</a></li>
					<li><a <?php if(preg_match('/^api/', CURRENT_PAGE)): ?>class="active" <?php endif; ?>href="<?= url('api'); ?>">API</a></li>
					<li><a <?php if(preg_match('/^support/', CURRENT_PAGE)): ?>class="active" <?php endif; ?>href="<?= url('support'); ?>">Support</a></li>

					<?php if(\Library\Auth::logged_in()): ?>
						<li><a <?php if(CURRENT_PAGE === 'dashboard'): ?>class="active" <?php endif; ?>href="<?= url('dashboard'); ?>">Dashboard</a></li>
						<li><a href="<?= url('auth/logout'); ?>">Log Out</a></li>
					<?php endif; ?>

					<li><a href="https://github.com/evantbyrne/burner">Github</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="container">

			<?php $this->section('content'); ?>

				<!-- Default Content -->

			<?php $this->end_section(); ?>

		</div>

		<footer>&copy; <?= date('Y'); ?></footer>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-41057402-1', 'burnercms.com');
			ga('send', 'pageview');
		</script>
		
	</body>
</html>