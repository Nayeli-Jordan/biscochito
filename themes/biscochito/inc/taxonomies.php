<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////
add_action( 'init', 'custom_taxonomies_callback', 0 );
function custom_taxonomies_callback(){

	// Elementos que incluye el paquete
	if( ! taxonomy_exists('opcion')){

		$labels = array(
			'name'              => 'Opción',
			'singular_name'     => 'Opción',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar opción',
			'update_item'       => 'Actualizar opción',
			'add_new_item'      => 'Nueva opción',
			'menu_name'         => 'Opción paquete'
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

	// Extras que incluye el paquete
	if( ! taxonomy_exists('extra')){

		$labels = array(
			'name'              => 'Extra',
			'singular_name'     => 'Extra',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Extra',
			'update_item'       => 'Actualizar Extra',
			'add_new_item'      => 'Nuevo Extra',
			'menu_name'         => 'Extra paquete'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'extra' ),
		);

		register_taxonomy( 'extra', 'paquete', $args );
	}

	// Dulces de la variedad
	if( ! taxonomy_exists('elemento')){

		$labels = array(
			'name'              => 'Elemento',
			'singular_name'     => 'Elemento',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar elemento',
			'update_item'       => 'Actualizar elemento',
			'add_new_item'      => 'Nuevo elemento',
			'menu_name'         => 'Elemento paquete'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'elemento' ),
		);

		register_taxonomy( 'elemento', 'variedad', $args );
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

}