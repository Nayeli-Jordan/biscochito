<!DOCTYPE html>
<!-- Importante agregar el prefijo para cuando dice que og no se está usando -->
<html prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?></title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SEO -->
		<meta name="keywords" content="">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- Meta robots -->
		<meta name="robots" content="index, follow" />
		<meta name="googlebot" content="index, follow" />

		<!-- Favicon -->
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-16x16.png" sizes="16x16" />

		<!-- Facebook, Twitter metas -->
		<meta property="og:title" content="<?php bloginfo('name'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo site_url(); ?>" />
		<meta property="og:image" content="<?php echo THEMEPATH; ?>images/share.png">
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
		<meta name="twitter:description" content="<?php bloginfo('description'); ?>" />
		<meta name="twitter:image" content="<?php echo THEMEPATH; ?>images/share.png" />
		<meta name="twitter:title" content="<?php bloginfo('name'); ?>" />
		<meta property="og:image:width" content="210" />
		<meta property="og:image:height" content="110" />
		<meta property="fb:app_id" content="" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@" />

		<!-- Google+ -->
		<link rel="publisher" href="https://plus.google.com/+biscochito">

		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">

		<!-- Google font(s) -->
		<link href="https://fonts.googleapis.com/css?family=Rancho|Open+Sans:400" rel="stylesheet">

		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="<?php echo THEMEPATH; ?>stylesheets/materialize.css" media="screen,projection" />

		<!-- Canonical URL -->
		<link rel="canonical" href="<?php echo site_url(); ?>" />

		<!-- Sitemap Google Verify -->
		<!--  https://www.google.com/webmasters/verification/home?hl=en&authuser=0 -->
		<meta name="google-site-verification" content="" />

		<!-- Noscript -->
		<noscript>Tu navegador no soporta JavaScript!</noscript>
		<?php wp_head(); ?>
	</head>
	<body>
		<header class="js-header">			
			<nav>
				<div class="nav-wrapper [ container ]">
					<a href="<?php echo SITEURL ?>" class="brand-logo">
						<h1 class="hide">Biscochito</h1>
						<img class="responsive-img logo-initial" src="<?php echo THEMEPATH ?>images/identidad/logo.png" alt="logo del sitio">
						<img class="responsive-img logo-scroll hide" src="<?php echo THEMEPATH ?>images/identidad/logo-fondo.png" alt="logo del sitio">
					</a>
					<a href="#" data-activates="menu-main-menu" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul id="menu-main-menu">
						<?php
							$menu_name = 'top_menu';

							if (( $locations = get_nav_menu_locations()) && isset( $locations[ $menu_name ])) {
								$menu = wp_get_nav_menu_object( $locations[ $menu_name ]);
								$menu_items = wp_get_nav_menu_items( $menu->term_id );
								$menu_list = '';
								foreach ( (array) $menu_items as $key => $menu_item) {
									$id 		= $menu_item->attr_title;
									$title 		= $menu_item->title;
									$url 		= $menu_item->url;
									$menu_list .='<li><a id="' . $id . '" href="' . $url . '" class="">' . $title . '</a></li>';
								}
							}
							echo $menu_list;
						?>						
					</ul>
				</div>
			</nav>
		</header>
		<div id="section-intro" class="[ main-body ]">