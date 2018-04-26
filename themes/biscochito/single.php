<?php 
	get_header();
	global $post;
	
	while ( have_posts() ) : the_post(); 
?>
	<section class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-initial.png);">
		<div class="[ container ][ bg-degrade ]">
			<h1><?php the_title(); ?></h1>
		</div>	
	</section>
	<section class="[ container ][ padding-top-bottom-xlarge ]">
		<div class="[ row ]">
			<div id="content-pack" class="[ col s12 m6 l7 ]">
				<img class="materialboxed responsive-img margin-bottom" src="<?php the_post_thumbnail_url(); ?>" alt="imagen destacada del paquete">
				<div id="gallery-single" class="[ margin-bottom ]">
					<!-- gallery -->
					<?php 
						$custom_fields 	= get_post_custom();
						$post_id 		= get_the_ID();
						$image 			= get_post_meta( $post_id, 'paquete_image', true );
						$image1			= get_post_meta( $post_id, 'paquete_image1', true );
						$image2			= get_post_meta( $post_id, 'paquete_image2', true );
						$image3			= get_post_meta( $post_id, 'paquete_image3', true );
						$image4			= get_post_meta( $post_id, 'paquete_image4', true );
						$image5			= get_post_meta( $post_id, 'paquete_image5', true );
						$precio50		= get_post_meta( $post_id, 'paquete_precio50', true );
						$precio100		= get_post_meta( $post_id, 'paquete_precio100', true );
						$precio150		= get_post_meta( $post_id, 'paquete_precio150', true );
						$precio200		= get_post_meta( $post_id, 'paquete_precio200', true );
						$precio250		= get_post_meta( $post_id, 'paquete_precio250', true );
					?>
					<?php if( $image != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image; ?>" alt="imagen destacada del paquete">
					<?php } ?>
					<?php if( $image1 != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image1; ?>" alt="imagen destacada del paquete">
					<?php } ?>	
					<?php if( $image2 != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image2; ?>" alt="imagen destacada del paquete">
					<?php } ?>	
					<?php if( $image3 != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image3; ?>" alt="imagen destacada del paquete">
					<?php } ?>	
					<?php if( $image4 != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image4; ?>" alt="imagen destacada del paquete">
					<?php } ?>	
					<?php if( $image5 != "" ) { ?>
						<img class="materialboxed responsive-img" src="<?php echo $image5; ?>" alt="imagen destacada del paquete">
					<?php } ?>					
				</div>
				<div class="[ margin-bottom ]">
					<p class="large [ color-primary-dark ]">El paquete incluye:</p>
					<!-- opciones del paquete -->
					<?php echo custom_taxonomies_opciones(); ?>				
				</div>
				<hr class="line-difumined-to-rigth">
				<div>
					<p class="large [ color-primary-dark ]">También incluye:</p>
					<p><i class="material-icons tiny color-primary-dark align-middle">check_circle</i> Montaje y <span class="tooltipped" data-position="bottom" data-tooltip="Despues de las 12:00 am hay un cargo extra por desmontaje">desmontaje<span class="color-primary">*</span></span></p>				
					<p><i class="material-icons tiny color-primary-dark align-middle">check_circle</i> Personalización de acuerdo a los colores o tema de tu evento</p>				
					<p><i class="material-icons tiny color-primary-dark align-middle">check_circle</i> Los contenedores necesarios para los dulces, postres y/o frutas<span class="tooltipped color-primary" data-position="bottom" data-tooltip="Se retiran a la hora del desmontaje">*</span></p>
					<p><i class="material-icons tiny color-primary-dark align-middle">check_circle</i> Servilletas y recipientes o bolsas de papel para consumir los productos</p>				
					<hr class="line-difumined-to-rigth">
					<p class="large [ color-primary-dark ]">No incluye:</p>
					<p><i class="material-icons tiny color-primary-dark align-middle">cancel</i> Mesa o soporte</p>				
					<p><i class="material-icons tiny color-primary-dark align-middle">cancel</i> Costo de entrega<span class="tooltipped color-primary" data-position="bottom" data-tooltip="Se calcula según la zona">*</span></p>				
				</div>
				<hr class="line-difumined-to-rigth">
				<h3 class="[ color-primary-dark ]">Variedades disponibles</h3>
				<p>Contamos con las siguientes variedades de dulces para tu elección</p>
				<!-- Taxonomía variedad -->
				<?php echo custom_taxonomies_variedad(); ?>

			</div>
			<div id="content-info-pack" class="[ col s12 m6 l5 ][ relative ]">
				<div id="info-pack">
					<table class="[ margin-bottom ]">
						<thead>
							<tr>
								<th>Personas</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>
							<?php if( $precio50 != "" ) : ?>
								<tr>
									<td>50</td>
									<td><?php echo $precio50; ?></td>
								</tr>
							<?php endif; ?>
							<?php if( $precio100 != "" ) : ?>
								<tr>
									<td>100</td>
									<td><?php echo $precio100; ?></td>
								</tr>
							<?php endif; ?>
							<?php if( $precio50 != "" ) : ?>
								<tr>
									<td>150</td>
									<td><?php echo $precio150; ?></td>
								</tr>
							<?php endif; ?>
							<?php if( $precio200 != "" ) : ?>
								<tr>
									<td>200</td>
									<td><?php echo $precio200; ?></td>
								</tr>
							<?php endif; ?>
							<?php if( $precio250 != "" ) : ?>
								<tr>
									<td>250</td>
									<td><?php echo $precio250; ?></td>
								</tr>
							<?php endif; ?>
							<tr>
								<td>Más</td>
								<td>A cotizar</td>
							</tr>
						</tbody>
					</table>
					<p><a href="<?php echo SITEURL ?>/politicas-de-ventas" target="_blank">Políticas de venta</a></p>
					<p class="[ margin-bottom ]">
						<a class="modal-trigger" href="#mapaentrega">Costo de entrega</a>
					</p>
					<a class="waves-effect waves-light btn margin-bottom-small" href="<?php echo SITEURL ?>/paquetes">ver todos los paquetes</a>			
					<div class="[ relative ]">
						<img src="<?php echo THEMEPATH ?>images/caramelos.png" alt="imagen caramelos">			
					</div>
				</div>				
			</div>
		</div>
	</section>
<?php 
	endwhile; // end of the loop.
	get_footer(); 
?>
