			<!-- contacto -->
			<section id="section-contacto" class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/contacto.png);">
				<div class="[ container ]">
					<div class="[ row ]">
						<?php if ( is_singular('paquete') ) :  ?>
							<div class="[ col s12 ]">
								<div class="[ bg-primary-opacity ][ color-light ][ padding-right-left padding-top-bottom-large ] ">
									<h2 class="[ text-center ]">¿Te interesa este paquete para tu evento?<br>¡Contáctanos!</h2>
									<!-- form -->
									<?php echo do_shortcode('[contact-form-7 id="30" title="Contacto paquete"]'); ?>
									<h3 class="[ text-center ]">¿Aún no estás seguro del paquete que prefieres?<br>Podemos ayudarte</h3>
									<div class="[ text-center ][ margin-top ] ">
										<?php include (TEMPLATEPATH . '/sections/contact-info.php'); ?>
									</div>
								</div>						
							</div>							
						<?php else:  ?>
							<div class="[ col s12 m7 l6 ]">
								<div class="[ bg-primary-opacity ][ color-light ][ padding-right-left padding-top-bottom-large ] ">
									<h2 class="[ text-center ]">Contacto</h2>
									<!-- form -->
									<?php echo do_shortcode('[contact-form-7 id="26" title="Contacto"]'); ?>									
								</div>						
							</div>
							<div class="[ col s12 m5 l6 ]">
								<div class="[ bg-primary-opacity ][ color-light ][ text-center ][ padding-right-left padding-top-bottom-large no-padding-top-s-and-down ] ">
									<?php include (TEMPLATEPATH . '/sections/contact-info.php'); ?>
								</div>						
							</div>
						<?php endif;  ?>
					</div>
				</div>
			</section>		
			<footer>
				<small><a class="[ underline ]" href="<?php echo SITEURL; ?>politica-de-ventas">Política de ventas</a></small><br>
				<small>Biscochito © <span id="year"></span> | <a href="https://gatchweb.com/" target="_blank">Hecho por GatchWeb</a></small>
			</footer>
			<div id="intro" class="return-top">
				<i class="material-icons">expand_less</i>
			</div>

			<?php if (is_singular()) :  ?>
				<div id="mapaentrega" class="modal">
					<div class="modal-content">
						<div class="btn-close-modal modal-action modal-close">
							<i class="material-icons">close</i>
						</div>						
						<?php include (TEMPLATEPATH . '/sections/costo-entrega.php'); ?>
					</div>
				</div>
			<?php endif; ?>

		</div> <!-- end main-body -->
		<?php wp_footer(); ?>
	</body>
</html>