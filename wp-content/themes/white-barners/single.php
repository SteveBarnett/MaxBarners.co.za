<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<h3 id="previous"><?php previous_post_link('%link', '&larr; previous') ?></h3>
	<h3 id="next"><?php next_post_link('%link', 'next &rarr;') ?></h3>

	<h1><?php the_title(); ?></h1>
	
	<div id="content" class="single">
	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	
<div class="posted">
<a href="<?php the_permalink() ?>"><?php the_time(); ?> on <?php the_date(); ?></a>
</div>
<div class="posted">
<?php the_category(' &bull; '); ?>
</div>


<?php comments_template(); ?>

</div> <?php end #content ?>

<?php else : // else if no have_posts() ?>

<div id="search">

<h4 id="pnf">Oops, page not found!</h4>

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
