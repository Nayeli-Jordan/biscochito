<?php get_header(); ?>
	<!-- <section class="[ relative ][ bg-image ]" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"> -->
	<?php 
		$id=69;
		$post = get_page($id);
		$content_banner_initial = apply_filters('the_content', $post->post_content);	
	?>
	<section class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-initial.png);">
		<div class="[ container ][ bg-degrade bg-degrade-large ][ text-large ]">
			<?php echo $content_banner_initial; ?>
		</div>	
	</section>
	<section id="section-servicios" class="[ container ][ text-center ][ padding-top-bottom-xlarge ]">
		<h2 class="[ color-primary-dark ]">Servicios</h2>
		<?php 
			$id=67;
			$post = get_page($id);
			$content_servicios = apply_filters('the_content', $post->post_content);		
		?>
		<?php echo $content_servicios; ?>
		<div class="[ row ][ margin-top ]">			
			<?php include (TEMPLATEPATH . '/sections/loop-servicios.php'); ?>
		</div>
	</section>
	<?php 
		$id=70;
		$post = get_page($id);
		$content_banner_secundario = apply_filters('the_content', $post->post_content);		
	?>	
	<section class="[ relative ][ bg-image ][ padding-top-bottom-large ][ text-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-secundario.png);">
		<div class="[ container ][ bg-degrade ]">
			<?php echo $content_banner_secundario; ?>
		</div>	
	</section>
	<section class="[ container ][ text-center ][ padding-top-bottom-xlarge ]">
		<h2 class="[ color-primary-dark ]">Nuestros Paquetes</h2>
		<?php 
			$id=6;
			$post = get_page($id);
			$content_paquetes = apply_filters('the_content', $post->post_content);		
		?>		
		<?php echo $content_paquetes; ?>
		<div class="[ row ][ margin-top ]">
			<?php include (TEMPLATEPATH . '/sections/loop-paquetes.php'); ?>	
			<div class="[ col s12 ][ margin-top ]">
				<a class="waves-effect waves-light btn" href="<?php echo SITEURL ?>/paquetes">ver todos los paquetes</a>
			</div>
		</div>
	</section>	
	<section class="[ padding-top-bottom-xlarge ][ bg-primary-light ]">
		<div class="[ container ][ text-center ]">
			<h2 class="[ color-light ]">Galería</h2>
			<!-- galería -->
			<div class="grid [ margin-bottom ]">
				<?php include (TEMPLATEPATH . '/sections/loop-gallery.php'); ?>						
			</div>
			<a class="waves-effect waves-light btn" href="<?php echo SITEURL ?>/galeria">ver más</a>			
		</div>
	</section>
	<section class="[ container ][ padding-top-bottom-xlarge ]">
		<h2 class="[ color-primary-dark ][ text-center ]">Costo de entrega</h2>
		<div class="[ row ]">
			<div class="[ col s12 m4 offset-m2 ]">
				<!-- map -->
				<?php include (TEMPLATEPATH . '/sections/map-svg.php'); ?>	
			</div>
			<div class="[ col s12 m4 ]">
				<table class="price-zone">
					<thead>
						<tr>
							<th>Zona</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><span class="block-color-precio bajo"></span></td>
							<td>$99</td>
						</tr>
						<tr>
							<td><span class="block-color-precio medio"></span></td>
							<td>$130</td>
						</tr>
						<tr>
							<td><span class="block-color-precio alto"></span></td>
							<td>$170</td>
						</tr>
						<tr>
							<td><span class="block-color-precio cotizar"></span></td>
							<td>A cotizar</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<?php get_footer(); ?>