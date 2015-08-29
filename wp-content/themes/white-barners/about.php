<?php get_header(); ?>

<?php
/*
Template Name: About
*/
?>

	<h4><?php the_title(); ?></h4>
	
	<div id="content" class="single">
	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	
</div> <?php end #content ?>

<div id="currently">
Abouty
</div>	

<?php get_footer(); ?>
