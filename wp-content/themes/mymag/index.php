<?php get_header(); ?>
<?php $myOptions = get_option('myOptions'); ?>
<div class="page-wrapper">

<div id="column-left">

<div class="slideshow">			
<div id="slider">

<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['slide_cat']) {
$category = $myOptions['slide_cat'];
} else {
$category = 0;
}
if ($myOptions['slide_posts']) {
$posts = $myOptions['slide_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>
<div class="slideit">
<div class="pic">
<?php
$img = get_thumbnail_src();
if(isset($img)) { ?>
<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $img;?>&h=311&w=553&zc=1" alt="<?php the_title();?>" />
<?php }?>
</div>
<div class="title">
<h2><a href="<?php $category = get_the_category(); $category_id = $category[0]->cat_ID; echo get_category_link($category_id);?>"><?php echo $category[0]->cat_name;?></a><em> &mdash; <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></em></h2>
<h1><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>							
</div>
<div class="arrow"></div>						
</div>
<?php endwhile;?>							
</div>				
</div>

<div id="bottom-container">
	
<div class="bottomslider" id="slider-bottom">
	
<ul>
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;  
if ($myOptions['bottom_cat']) {
$category = $myOptions['bottom_cat'];
} else {
$category = 0;
}
if ($myOptions['bottom_posts']) {
$posts = $myOptions['bottom_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>
<li>
<?php
$img = get_thumbnail_src();
if(isset($img)) { ?>
<a href="<?php echo $img;?>" rel="prettyPhoto[gallery3]"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $img;?>&h=76&w=152&zc=1" alt="<?php the_title();?>" /></a>
<?php }?>
<p>
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
<span class="desc"><?php echo new_excerpt('15'); ?></span>
</p>
</li>
<?php endwhile;?>
</ul>

<div class="slider-nav">
<p class="back"><a href="#" title="Back"></a></p>
<p class="next"><a href="#" title="Next"></a></p>
</div>
</div>
</div>
</div>

<div id="column-right">
<div id="recent-articles">
<h1>Recent News</h1>
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['recent_cat']) {
$category = $myOptions['recent_cat'];
} else {
$category = 0;
}
if ($myOptions['recent_posts']) {
$posts = $myOptions['recent_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>	
<div class="article">
<?php
$img = get_thumbnail_src();
if(isset($img)) { ?>
<div class="thumb-small"><a href="<?php echo $img;?>" rel="prettyPhoto[gallery2]"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $img;?>&h=50&w=50&zc=1" alt="<?php the_title();?>" /></a></div>
<?php }?>
<span class="title"><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></span>
<span class="date">Published <?php the_time('F j, Y'); ?></span>
</div>
<?php endwhile;?>
</div>
</div>


<div id="left-posts">
<?php
$thumbs = $myOptions['show_thumbs'];
if($thumbs == "no") {
} else { ?>
<div id="featured-container">

<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['feat_cat']) {
$category = $myOptions['feat_cat'];
} else {
$category = 0;
}
if ($myOptions['feat_posts']) {
$posts = $myOptions['feat_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>		
<div class="featured-post">
<?php
$img = get_thumbnail_src();
if(isset($img)) { ?>
<div class="thumbnail">
<a href="<?php echo $img;?>" rel="prettyPhoto[gallery1]"><img class="lightbox" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $img;?>&h=184&w=174&zc=1" alt="<?php the_title();?>" /></a>
</div>
<div class="content">
<?php } else { ?>
<div class="content no">
<?php } ?>
<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<p><?php echo new_excerpt(50);?></p>
<a href="<?php the_permalink();?>" class="readmore">readmore</a><span class="category-list">
<?php
$category = get_the_category();
$count = count($category);
$j = 3;
if($count < 3) {
$j = $count;
}
for($i=0; $i<$j; $i++) {
?>
<a href="<?php $category = get_the_category(); $category_id = $category[$i]->cat_ID; echo get_category_link($category_id);?>"><?php echo $category[$i]->cat_name;?></a><?php if($i < $j-1) {echo ", ";}?>
<?php } ?>  
</span>
</div>
</div>
<?php endwhile;?>
</div>
<?php } ?>

<?php
$nothumbs = $myOptions['show_no_thumbs'];
if($nothumbs == "no") {
} else { ?>
<div id="feat-no-thumb">
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['feat_no_cat']) {
$category = $myOptions['feat_no_cat'];
} else {
$category = 0;
}
if ($myOptions['feat_no_posts']) {
$posts = $myOptions['feat_no_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>	
<div class="featured-no-post">
<div class="content">
<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<span class="date"><?php the_time('F j, Y'); ?></span>
<span class="comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span>
<p><?php the_excerpt();?></p>
<a href="<?php the_permalink();?>" class="readmore">readmore</a><span class="category-list">
<?php
$category = get_the_category();
$count = count($category);
$j = 2;
if($count < 2) {
$j = $count;
}
for($i=0; $i<$j; $i++) {
?>
<a href="<?php $category = get_the_category(); $category_id = $category[$i]->cat_ID; echo get_category_link($category_id);?>"><?php echo $category[$i]->cat_name;?></a><?php if($i < $j-1) {echo ", ";}?>
<?php } ?>
</span>
</div>
</div>
<?php endwhile;?>

</div>
<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php $ticker = $myOptions['show_newsticker'];
if($ticker == "yes" || !isset($ticker)) { ?>
<ul id="ticker01">
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($myOptions['ticker_cat']) {
$category = $myOptions['ticker_cat'];
} else {
$category = 0;
}
if ($myOptions['ticker_posts']) {
$posts = $myOptions['ticker_posts'];
} else {
$posts = 0;
}
query_posts("cat=$category&paged=$page&posts_per_page=$posts");
while ( have_posts() ) : the_post() ?>	
<li><span><?php the_time('F j, Y'); ?></span><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
<?php endwhile;?>
</ul>
<?php } ?>
</div>
<?php get_footer(); ?>
