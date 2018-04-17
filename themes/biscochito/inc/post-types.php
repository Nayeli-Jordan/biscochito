<?php

// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


add_action('init', function(){

	// variedad
	$labels = array(
		'name'          => 'Variedades',
		'singular_name' => 'Variedades',
		'add_new'       => 'Nueva variedad',
		'add_new_item'  => 'Nueva variedad',
		'edit_item'     => 'Editar variedad',
		'new_item'      => 'Nueva variedad',
		'all_items'     => 'Todo',
		'view_item'     => 'Ver variedad',
		'search_items'  => 'Buscar variedad',
		'not_found'     => 'No hay variedades.',
		'menu_name'     => 'Variedades'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'variedad' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title' ),
		'menu_icon' 		 => 'dashicons-clipboard'
	);
	register_post_type( 'variedad', $args );

	// servicio
	$labels = array(
		'name'          => 'Servicio',
		'singular_name' => 'Servicio',
		'add_new'       => 'Nuevo servicio',
		'add_new_item'  => 'Nuevo servicio',
		'edit_item'     => 'Editar servicio',
		'new_item'      => 'Nuevo servicio',
		'all_items'     => 'Todo',
		'view_item'     => 'Ver servicio',
		'search_items'  => 'Buscar servicio',
		'not_found'     => 'No hay servicio.',
		'menu_name'     => 'Servicio'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'servicio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail' ),
		'menu_icon' 		 => 'dashicons-admin-users'
	);
	register_post_type( 'servicio', $args );	

	// Paquete
	$labels = array(
		'name'          => 'Paquete',
		'singular_name' => 'Paquete',
		'add_new'       => 'Nuevo Paquete',
		'add_new_item'  => 'Nuevo Paquete',
		'edit_item'     => 'Editar Paquete',
		'new_item'      => 'Nuevo Paquete',
		'all_items'     => 'Todo',
		'view_item'     => 'Ver Paquete',
		'search_items'  => 'Buscar Paquete',
		'not_found'     => 'No hay Paquete.',
		'menu_name'     => 'Paquete'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'paquete' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'         => array( 'opcion' ),
		'menu_icon' 		 => 'dashicons-cart'
	);
	register_post_type( 'paquete', $args );	

	// galería
	$labels = array(
		'name'          => 'Galería',
		'singular_name' => 'Galería',
		'add_new'       => 'Nueva galería',
		'add_new_item'  => 'Nueva galería',
		'edit_item'     => 'Editar galería',
		'new_item'      => 'Nueva galería',
		'all_items'     => 'Todo',
		'view_item'     => 'Ver galería',
		'search_items'  => 'Buscar galería',
		'not_found'     => 'No hay galería.',
		'menu_name'     => 'Galería'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'galeria' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail' ),
		'menu_icon' 		 => 'dashicons-format-gallery'
	);
	register_post_type( 'galeria', $args );	

	// Zona de entrega
	$labels = array(
		'name'          => 'Zona de entrega',
		'singular_name' => 'Zona de entrega',
		'add_new'       => 'Nueva zona',
		'add_new_item'  => 'Nueva zona',
		'edit_item'     => 'Editar zona',
		'new_item'      => 'Nueva zona',
		'all_items'     => 'Todo',
		'view_item'     => 'Ver zona',
		'search_items'  => 'Buscar zona',
		'not_found'     => 'No hay zonaes.',
		'menu_name'     => 'Zona de entrega'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'zona' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title' ),
		'menu_icon' 		 => 'dashicons-location-alt'
	);
	register_post_type( 'zona', $args );


});