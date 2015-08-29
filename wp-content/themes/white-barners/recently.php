<?php
/*
Template Name: Recently
*/
?>

<?php get_header(); ?>

<div id="content" class="recently">

<h4>Recent posts</h4>

<ul>
<?php if (function_exists('c2c_get_recent_posts')) { ?>
<?php c2c_get_recent_posts (
10,
"<li><a href=\"%post_url%\">%post_excerpt%</a></li>",
'',
'date',
'DESC',
0,
'm/d/Y',
'',
false) ?>
<?php } ?>  
</ul>

</div> <?php end #content ?>

<div id="currently">

Recently posted...

</div>	

<?php get_footer(); ?>
