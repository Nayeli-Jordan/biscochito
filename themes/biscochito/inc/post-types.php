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
		'taxonomies'         => array( 'posicion' )
	);
	register_post_type( 'variedad', $args );


});