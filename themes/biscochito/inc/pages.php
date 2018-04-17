<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////

add_action('init', function(){

	// Banner inicial
	if( ! get_page_by_path('banner-inicial') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Banner inicial',
			'post_name'   => 'banner-inicial',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Servicios
	if( ! get_page_by_path('servicios') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Servicios',
			'post_name'   => 'servicios',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Banner secundario
	if( ! get_page_by_path('banner-secundario') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Banner secundario',
			'post_name'   => 'banner-secundario',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Paquetes
	if( ! get_page_by_path('paquetes') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Paquetes',
			'post_name'   => 'paquetes',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Galería
	if( ! get_page_by_path('gallery') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Galería',
			'post_name'   => 'gallery',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Política de ventas
	if( ! get_page_by_path('politica-de-ventas') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Política de ventas',
			'post_name'   => 'politica-de-ventas',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}


});