<?php 
	if ( is_front_page() ) :	
		$items = '8';
    else:
    	$items = '-1';
    endif;

	$galeria_args = array(
		'post_type' => 'galeria',
		'posts_per_page' => $items,
		'orderby'=> 'rand',
		'order'=> 'ASC'
	);
	$galeria_query = new WP_Query( $galeria_args );
	if ( $galeria_query->have_posts() ) :
	while ( $galeria_query->have_posts() ) : $galeria_query->the_post();
?>
	<div class="grid-item">
		<img class="materialboxed" src="<?php the_post_thumbnail_url('medium'); ?>" />
	</div>
<?php 
	endwhile;
	wp_reset_postdata();
	else:
?>
	<p>Falta agregar imágenes a la galería</p>	
<?php endif; ?>		