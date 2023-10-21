<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta id="viewport-tag" name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<main id="main-wrapper">


	<header class="header fixed w-100">
		<div class="default-container header__container flex justify-between items-center">
			<div class="header__logo">
				<a href="<?= get_site_url()  ?>" class="blog">
					<img src="<?= get_stylesheet_directory_uri()?>/assets/images/logo.png" alt="Marvel" class="block w-100 h-auto" width="408" height="168">
				</a>
			</div>
			<nav class="header__nav">
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_id' => 'nav', 'theme_location' => 'primary-menu', 'menu_class' => 'flex items-center') ); ?>
			</nav>
		</div>
	</header>
	

	<?php if(! is_home() ) : ?>
	<div class="ip-banner relative">
		<canvas width="1600" height="550"></canvas>
		<img src="<?= get_stylesheet_directory_uri()?>/assets/images/banner.jpg" alt="slide1" class="block w-100 absolute h-100 top-0 left-0 object-fit-cover object-position-center "> 
	</div>

	<div class="default-container">

	<?php endif;?>

