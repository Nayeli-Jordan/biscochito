<?php 
	if ( is_front_page() ) :	
		$items = '4';
    else:
    	$items = '-1';
    endif;

	$paquetes_args = array(
		'post_type' => 'paquete',
		'posts_per_page' => $items,
		'order'=> 'ASC'
	);
	$paquetes_query = new WP_Query( $paquetes_args );
	if ( $paquetes_query->have_posts() ) :
	while ( $paquetes_query->have_posts() ) : $paquetes_query->the_post();
?>
	<div class="[ col s6 m3 ][ margin-bottom-small-sm-and-down ]">
		<div class="[ bg-image ][ padding-bottom-75p ][ margin-bottom-small ]" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);"></div>
		<h3><?php the_title(); ?></h3>
	</div>
<?php 
	endwhile;
	wp_reset_postdata();
	else:
?>
	<p>Falta agregar paquetes</p>	
<?php endif; ?>		