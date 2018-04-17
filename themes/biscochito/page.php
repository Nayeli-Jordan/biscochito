<?php 
	get_header(); 	
	the_post();
	/* Política de ventas */
?>
<section class="[ relative ][ bg-image ][ padding-top-bottom-large ]" style="background-image: url(<?php echo THEMEPATH ?>images/bg-initial.png);">
	<div class="[ container ][ bg-degrade ]">
		<h1><?php the_title(); ?></h1>
	</div>	
</section>
<section class="[ container ][ padding-top-bottom-xlarge ]">
	<?php the_content(); ?>
</section>
<?php get_footer(); ?>