<!DOCTYPE html>
<html>
	<head>
		<!-- auto head -->
		<?php wp_head(); ?>
		<title><?php wp_title(" | ", true, 'right'); bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.pack.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ct.js"></script>
	</head>
	<body>

	<!-- top bar -->
		<header>
			<!-- mobile menu icon -->
			<button id="mobile-menu-icon"></button>

			<!-- logo -->
			<a href="/" id="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Code Terrific" />
			</a>

			<!-- main menu -->
			<nav id="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
		</header>