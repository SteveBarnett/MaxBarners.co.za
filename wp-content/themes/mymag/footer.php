<?php $myOptions = get_option('myOptions'); ?>
<div id="footer">
<div class="container">
<div class="column-left">
<h2>News</h2>
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['footer_feat']) {
$category = $myOptions['footer_feat'];
} else {
$category = 0;
}
if ($myOptions['footer_posts']) {
$posts = $myOptions['footer_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>
<div class="news-article">
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
<p><?php echo new_excerpt(20);?></p>
</div>
<?php endwhile;?>
</div>

<div class="column-middle">
<div class="footer-sidebar">
<ul id="footer-sidebar">
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Footer Sidebar') ) : ?>
 <?php endif; ?>
</ul>
</div>
</div>

<div class="column-right">
<?php
if($myOptions['about_post']) {
$post_id = $myOptions['about_post'];
} else {
$post_id = 1;
}
$queried_post = get_post($post_id);
$title = $queried_post->post_title;
echo "<h2>".$title."</h2>";
echo "<p>".$queried_post->post_content."</p>";
?>
</div>

</div>
</div>
<div id="footer-btm">
<div class="copyright">
<span class="theme"><a href="http://www.wp-themix.org" target="_blank" title="Wordpress Themes">myMag Wordpress Theme</a> by <a href="http://www.iwebix.de" target="_blank" title="webdesign">IWEBIX</a></span>
<span class="blog">Copyright by <strong><?php bloginfo('name');?> - <?php bloginfo('description'); ?></strong></span>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

