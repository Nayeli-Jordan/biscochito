<?php 
	$servicios_args = array(
		'post_type' => 'servicio',
		'posts_per_page' => '4',
		'order'=> 'ASC'
	);
	$servicios_query = new WP_Query( $servicios_args );
	if ( $servicios_query->have_posts() ) :
	while ( $servicios_query->have_posts() ) : $servicios_query->the_post();
?>
	<div class="[ col s6 m3 ][ margin-bottom-small-sm-and-down ]">
		<div class="[ bg-image ][ padding-bottom-75p ][ margin-bottom-small ][ relative ]" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
			<div class="[ bg-primary-opacity ][ color-light ][ padding-right-left-xsmall padding-top-bottom-xsmall ][ absolute bottom-0 width-100p ]">
				<h3><?php the_title(); ?></h3>
			</div>			
		</div>

	</div>
<?php 
	endwhile;
	wp_reset_postdata();
	else:
?>
	<p>Falta agregar servicios</p>	
<?php endif; ?>		