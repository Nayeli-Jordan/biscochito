<?php 

	$testimonial_args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => '3',
		'order'=> 'ASC'
	);
	$testimonial_query = new WP_Query( $testimonial_args );
	if ( $testimonial_query->have_posts() ) :
	while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
?>
	<div class="col s12 m4">
		<div class="[ box-testimonial ]">
			<img src="<?php echo THEMEPATH ?>images/caramelos.png" alt="imagen caramelos">			
			<?php the_content(); ?>
			<div class="[ margin-top-small ][ text-right ]">
				<p class="[ author-testimonial ]"><?php the_title(); ?></p>
				<?php echo get_the_term_list( $post->ID, 'evento', '<p><small>', ',</small><small>', '</small></p>' ); ?>
			</div>
		</div>
	</div>
<?php 
	endwhile;
	wp_reset_postdata();
	else:
?>
	<p>Falta agregar testimoniales</p>	
<?php endif; ?>		