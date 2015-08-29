<?php get_header(); ?>

<div class="page-wrapper">
	
<div id="left-posts">
	
<div id="subpage">
	
<div class="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h2><?php the_title();?></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<?php edit_post_link('Edit Post'); ?>
<?php the_content();?>
<?php the_tags( '<span class="tag-list"><strong>Tags: </strong>', ', ', '</span>'); ?><span class="category-list"><?php the_category(', ');?></span>
<?php endwhile; endif;?>
</div>
<div id="comment-wrap">
<?php comments_template(); ?>
</div>
</div>


</div>

<?php include(TEMPLATEPATH."/sidebar-sub.php");?>

<?php get_footer(); ?>











