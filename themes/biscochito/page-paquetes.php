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
		<?php include (TEMPLATEPATH . '/sections/loop-paquetes.php'); ?>
	</div>
</section>
<?php get_footer(); ?>