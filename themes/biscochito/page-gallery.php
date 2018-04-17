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
	<div class="grid [ margin-bottom ]">
		<?php include (TEMPLATEPATH . '/sections/loop-gallery.php'); ?>						
	</div>
</section>
<?php get_footer(); ?>