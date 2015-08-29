<?php get_header(); ?>

<div class="page-wrapper">
	
<div id="left-posts">
	
<div id="subpage">
	
<div class="content">

<?php if (have_posts()) : ?>
<h1>Search <strong>Results</strong></h2>	
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<?php
$img = get_thumbnail_src();
if(isset($img)) { ?>
<div class="thumbnail">
<a href="<?php echo $img;?>" rel="prettyPhoto[gallery1]"><img class="lightbox" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $img;?>&h=150&w=160&zc=1" alt="<?php the_title();?>" /></a>
</div>
<div class="with-thumb">
<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<p><?php the_excerpt(__('continue reading...')); ?></p>
<?php the_tags( '<div class="tag-list"><strong>Tags: </strong>', ', ', '</div>'); ?><div class="category-list"><?php the_category(', ');?></div>
</div>
</div>
<?php } else { ?>
<div class="with-thumbs">
<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<p><?php the_excerpt(__('continue reading...')); ?></p>
<?php the_tags( '<span class="tag-list"><strong>Tags: </strong>', ', ', '</span>'); ?><span class="category-list"><?php the_category(', ');?></span>
</div>
</div>
<?php } ?>
<?php endwhile; ?>
	<?php else: ?>
        <div class="post">
	<h1>Sorry, no Posts matched your Criteria</h1>
		<?php get_search_form();?>
	</div>

<?php endif; ?>

</div>
<?php
include(TEMPLATEPATH."/scripts/wp-pagenavi.php");
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>
</div>
</div>

<?php include(TEMPLATEPATH."/sidebar-sub.php");?>   

<?php get_footer(); ?>
