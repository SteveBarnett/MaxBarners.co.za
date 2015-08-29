<?php get_header(); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

	<h3 id="previous"><?php posts_nav_link('','','&larr; earlier') ?></h3>
	<h3 id="next"><?php posts_nav_link('','later &rarr;','') ?></h3>

	<h1><?php the_title(); ?></h1>
	
<div id="content" class="single">

<?php the_content('info &darr;'); ?>

<div class="posted">
<a href="<?php the_permalink() ?>"><?php the_time(); ?> on <?php the_date(); ?></a> &bull; 
<?php comments_popup_link(); ?>
</div>
<div class="posted">
<?php the_category(' &bull; '); ?>
</div>

<?php endwhile; ?>

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

	<div id="footer">
	<ul>
	<?php wp_list_pages('title_li='); ?>
	</ul>
	</div>

<?php get_footer(); ?>
