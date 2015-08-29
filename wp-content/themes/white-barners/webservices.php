<?php get_header(); ?>

<?php
/*
Template Name: Web Services
*/
?>

	<h4><?php the_title(); ?></h4>
	
	<div id="content" class="webservices">
	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	
</div> <?php end #content ?>

<div id="currently">
Web Services
</div>	

<?php get_footer(); ?>
