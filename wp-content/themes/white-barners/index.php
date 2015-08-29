<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<h3 id="previous"><?php posts_nav_link('','','&larr; earlier') ?></h3>
	<h3 id="next"><?php posts_nav_link('','later &rarr;','') ?></h3>

	<div id="content">
	<div id="thumbs">
	<?php while (have_posts()) : the_post(); ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>. posted on <?php the_time('F jS Y') ?>"><?php the_excerpt(); ?></a>	
	<?php endwhile; ?>
</div> <?php // end #thumbs ?>

	</div> <?php // end #content ?>
	
	
<div id="currently">

<?php if(is_category()) { ?> Shots in the category <?php single_cat_title(''); ?>. <?php } ?>
<?php if(is_day()) { ?> Shots from <?php the_time('l, F jS Y'); ?>. <?php } ?>
<?php if(is_month()) { ?> Shots from <?php the_time('F Y'); ?>. <?php } ?>
<?php if(is_year()) { ?> Shots from <?php the_time('Y'); ?>. <?php } ?>


</div>	



<?php else : // else if no have_posts() ?>

<div id="search">

<h4>Oops, file not found!</h4>

<p>Sorry, couldn't find what you asked for.</p>

You can try:
<ul>
<li>going to <a href="<?php echo get_option('home'); ?>/">the front page</a></li>
<li>viewing <a href="/">the archive pages</a></li>
<li>searching the site using the box below</li>
</ul>

<?php include (TEMPLATEPATH . "/searchform.php"); ?>

</div> <?php // end #search ?>

<?php endif; // end if have_posts()  ?>

<?php get_footer(); ?>
