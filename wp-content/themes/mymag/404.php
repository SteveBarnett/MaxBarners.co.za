<?php get_header(); ?>

<div class="page-wrapper">
	
<div id="left-posts">
	
<div id="subpage">
	
<div class="content">

<?php if (have_posts()) : 
while (have_posts()) : the_post();?>
           
<div class="post">	
<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<p><?php the_excerpt(__('continue reading...')); ?></p>
<span class="tag-list"><?php the_time('F j, Y'); ?></span><span class="category-list"><?php the_category(', ');?></span>
</div>
<?php endwhile;?>

<?php else: ?>
<div class="post">
<h1>Error 404 - Page not found </h1>
<p>The page you are looking for is not available, please type in a correct link.</p>
</div>

<?php endif; ?>   

</div>
</div>

</div>

<?php include(TEMPLATEPATH."/sidebar-sub.php");?>            

<?php get_footer(); ?>