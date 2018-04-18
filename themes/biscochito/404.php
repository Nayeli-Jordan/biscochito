<?php get_header(); ?>
	<section class="[ text-center ][ bg-primary color-light ][ padding-top-bottom-large ]">
		<h1>¿Te perdiste?</h1>
	</section>
	<section class="[ container ][ padding-top-bottom-large ][ text-center ]">
		<p class="[ color-primary ][ large ][ margin-bottom ]"><strong>Error 404!</strong></p>
		<a href="<?php echo SITEURL ?>">
			<img class="responsive-img logo-initial" src="<?php echo THEMEPATH ?>images/identidad/logo.png" alt="logo del sitio">
		</a>
		<p class="large [ margin-bottom ]">Lo sentimos!<br>La página que estás buscando no existe</p>
		<a class="waves-effect waves-light btn" href="<?php echo SITEURL ?>">volver al inicio</a>
	</section>
<?php get_footer(); ?>