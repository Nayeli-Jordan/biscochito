<?php 
	get_header();
	while ( have_posts() ) : the_post(); 
?>
	<section class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-initial.png);">
		<div class="[ container ][ bg-degrade ]">
			<h1><?php the_title(); ?></h1>
		</div>	
	</section>
	<section class="[ container ][ padding-top-bottom-xlarge ]">
		<div class="[ row ]">
			<div class="[ col s12 m6 l7 ]">
				<img class="responsive-img" src="<?php the_post_thumbnail_url(); ?>" alt="imagen destacada del paquete">
				<!-- more image (galery) -->
				<div class="[ margin-top-bottom ]">
					<p class="large [ color-primary-dark ]">El paquete incluye:</p>
					<!-- opciones del paquete -->
					<?php 
						$terms = get_the_terms($post->ID, 'opcion');
						foreach($terms as $term){
							echo "<p><i class='material-icons tiny color-primary-dark align-middle'>grade</i> ".$term->name."</p>";
						}
					?>					
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
				<p>Contamos con las siguientes variedades de dulces para tu elección de acuerdo al paquete que elijas</p>
				<ul class="collapsible">
					<?php
						$variedad_args = array(
							'post_type' => 'variedad',
							'posts_per_page' => -1,
							'order'=> 'ASC',
						);
						$variedad_query = new WP_Query( $variedad_args );
						if ( $variedad_query->have_posts() ) :
						$i = 1;
						while ( $variedad_query->have_posts() ) : $variedad_query->the_post();
					?>
						<li>
							<div class="collapsible-header">
								<i class="material-icons tiny color-primary icon-open">arrow_drop_down</i>
								<i class="material-icons tiny color-primary icon-close hide">arrow_drop_up</i>
								<span><?php the_title(); ?></span>
							</div>
							<div class="collapsible-body">
								<?php 
									$terms = get_the_terms($post->ID, 'elemento');
									foreach($terms as $term){
										echo "<p><i class='material-icons tiny color-primary-dark align-middle'>grade</i> ".$term->name."</p>";
									}
								?>
							</div>
						</li>
					<?php 
						$i ++;
						endwhile;
						wp_reset_postdata();
						else:
					?>
						<p>Falta agregar variedades</p>	
					<?php endif; ?>
				</ul>
			</div>
			<div class="[ col s12 m6 l5 ]">
				<div id="info-pack">
					<table class="[ margin-bottom ]">
						<thead>
							<tr>
								<th>Personas</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>50</td>
								<td>$0.87</td>
							</tr>
							<tr>
								<td>100</td>
								<td>$3.76</td>
							</tr>
							<tr>
								<td>150</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>200</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Más</td>
								<td>A cotizar</td>
							</tr>
						</tbody>
					</table>
					<p><a href="<?php echo SITEURL ?>/politicas-de-ventas">Políticas de venta</a></p>
					<p class="[ margin-bottom ]"><a href="<?php echo SITEURL ?>/costo-de-entrega">Costo de entrega</a></p>
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
