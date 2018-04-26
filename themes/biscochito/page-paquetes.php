<?php 
	get_header(); 	
	the_post();
?>
<section class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-initial.png);">
	<div class="[ container ][ bg-degrade ]">
		<h1><?php the_title(); ?></h1>
	</div>	
</section>
<section class="[ container ][ padding-top-bottom-xlarge ]">
	<div class="[ text-center ]">
		<?php the_content(); ?>
	</div>
	<div class="[ row ][ margin-top ]">
		<?php 
		    $taxonomyName = "servicio";
			$parent_terms = get_terms($taxonomyName,  array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));   
		    echo '<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">';
				foreach ($parent_terms as $pterm) {
					$servicios = $pterm->slug;
					echo '<li class="tab col s6 "><a class="';
					if ($servicios == "mesas-de-dulces") { echo "active"; }
					echo '" href="#' . $pterm->slug . '">' . $pterm->name . '</a></li>';
				}
		    echo '</ul>';

			//Loop term
			foreach ($parent_terms as $pterm) {

				echo '<div id="' . $pterm->slug . '" class="col s12">';
					
					$paquetes_args = array(
						'post_type' => 'paquete',
						'posts_per_page' => '-1',
						'order'=> 'ASC',
						'tax_query' 		=> array(
							array(
								'taxonomy' 	=> 'servicio',
								'field'	   	=> 'slug',
								'terms'	 	=> $pterm->slug
							)
						)
					);
					$paquetes_query = new WP_Query( $paquetes_args );
					if ( $paquetes_query->have_posts() ) :
					while ( $paquetes_query->have_posts() ) : $paquetes_query->the_post();
				?>
					<div class="[ col s6 m3 ][ text-center ][ margin-bottom-small-sm-and-down ]">
						<a href="<?php the_permalink(); ?> ">
							<div class="[ bg-image ][ padding-bottom-75p ][ margin-bottom-small ]" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);"></div>
							<h3><?php the_title(); ?></h3>
						</a>
					</div>
				<?php 
					endwhile;
					wp_reset_postdata();
					else:
				?>
					<p>No hay paquetes en está sección</p>	
				<?php endif;	

				echo '</div>';
			}	    
		?>		
	</div>

</section>
<?php get_footer(); ?>