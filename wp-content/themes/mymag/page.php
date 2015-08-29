<?php get_header(); ?>

<div class="page-wrapper">
	
<div id="left-posts">
	
<div id="subpage">
	
<div class="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h2><?php the_title();?></h2>
<?php the_content();?>
<?php endwhile; endif;?>

<div class="linkpages"><?php wp_link_pages('before=<strong>'.__('Pages:').'</strong>&pagelink=<span>'.__('Page %').'</span>'); ?></div>
<?php edit_post_link('Edit Post'); ?>
</div>

<div id="comment-wrap">
<?php comments_template(); ?>
</div>
</div>


</div>

<?php include(TEMPLATEPATH."/sidebar-sub.php");?>

<?php get_footer(); ?>