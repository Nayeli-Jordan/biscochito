<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////
add_action( 'init', 'custom_taxonomies_callback', 0 );
function custom_taxonomies_callback(){

	// Tipo de servicio del paquete
	if( ! taxonomy_exists('servicio')){

		$labels = array(
			'name'              => 'Servicio del paquete',
			'singular_name'     => 'Servicio del paquete',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar servicio',
			'update_item'       => 'Actualizar servicio',
			'add_new_item'      => 'Nueva servicio',
			'menu_name'         => 'Servicio del paquete'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'servicio' ),
		);

		register_taxonomy( 'servicio', 'paquete', $args );
	}

	// Elementos que incluye el paquete
	if( ! taxonomy_exists('opcion')){

		$labels = array(
			'name'              => 'Opción paquete (incluye)',
			'singular_name'     => 'Opción paquete (incluye)',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar opción',
			'update_item'       => 'Actualizar opción',
			'add_new_item'      => 'Nueva opción',
			'menu_name'         => 'Opción paquete (incluye)'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'opcion' ),
		);

		register_taxonomy( 'opcion', 'paquete', $args );
	}		

	// Dulces de la variedad
	if( ! taxonomy_exists('variedad')){

		$labels = array(
			'name'              => 'Variedad de dulces',
			'singular_name'     => 'Variedad de dulces',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar variedad',
			'update_item'       => 'Actualizar variedad',
			'add_new_item'      => 'Nueva variedad',
			'menu_name'         => 'Variedad de dulces'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'variedad' ),
		);

		register_taxonomy( 'variedad', 'paquete', $args );
	}	


	// Precio de entrega por zona
	if( ! taxonomy_exists('precio')){

		$labels = array(
			'name'              => 'Precio entrega',
			'singular_name'     => 'Precio entrega',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Precio',
			'update_item'       => 'Actualizar Precio',
			'add_new_item'      => 'Nueva Precio',
			'menu_name'         => 'Precio entrega'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'precio' ),
		);

		register_taxonomy( 'precio', 'zona', $args );
	}

	// Tipo de evento del testimonial
	if( ! taxonomy_exists('evento')){

		$labels = array(
			'name'              => 'Evento',
			'singular_name'     => 'Evento',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar evento',
			'update_item'       => 'Actualizar evento',
			'add_new_item'      => 'Nueva evento',
			'menu_name'         => 'Evento'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'evento' ),
		);

		register_taxonomy( 'evento', 'testimonial', $args );
	}				

}