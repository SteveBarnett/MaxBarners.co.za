<?php $myOptions = get_option('myOptions'); ?>
<div id="right-widgets">
<div class="right-left">
<div class="home-sidebar">
<ul id="sidebar">
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Sub Sidebar') ) : ?>
 <?php endif; ?>
</ul>
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['side_feat']) {
$category = $myOptions['side_feat'];
} else {
$category = 0;
}
if ($myOptions['side_posts']) {
$posts = $myOptions['side_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts&caller_get_posts=1");
while ( have_posts() ) : the_post() ?>
<div class="news-article">
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
<p><?php echo new_excerpt(20);?></p>
</div>
<?php endwhile;?>
</div>

</div>
<div class="right-right">
<?php if($myOptions['sidebar_banner']) {
echo stripslashes($myOptions['sidebar_banner']);
} ?>
</div>
</div>

</div>
