<article class="[ relative ]">
	<svg 
		xmlns:dc="http://purl.org/dc/elements/1.1/"
		xmlns:cc="http://creativecommons.org/ns#"
		xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
		xmlns:svg="http://www.w3.org/2000/svg"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
		xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
		width="100%" 
		height="100%" 
		viewBox="0 0 545 720" 
		id="mexico-map">

		<?php
			$zona_args = array(
				'post_type' => 'zona',
				'posts_per_page' => -1,
				'order'=> 'ASC'
			);
			$zona_query = new WP_Query( $zona_args );
			if ( $zona_query->have_posts() ) :
			while ( $zona_query->have_posts() ) : $zona_query->the_post();

			$custom_fields 	= get_post_custom();
			$post_id 		= get_the_ID();
			$id 			= get_post_meta( $post_id, 'zona_id', true );
			$path 			= get_post_meta( $post_id, 'zona_path', true );	

			$terms = get_the_terms($post->ID, 'precio');
			foreach($terms as $term){
				$precio = $term->slug;
			}
		?>
			<g id="<?php if( $id != "" ) : echo $id; endif; ?>" class="<?php echo $precio; ?>">
				<title><?php the_title(); ?></title>
				<desc>
					<?php the_content(); ?>
				</desc>
				<path d="<?php if( $path != "" ) : echo $path; endif; ?>" />
			</g>
		<?php 
			endwhile;
			wp_reset_postdata();
			else:
		?>
			<p>Falta agregar zonas</p>	
		<?php endif; ?>	
	</svg>
	<div id="provinceInfo"></div>
</article>