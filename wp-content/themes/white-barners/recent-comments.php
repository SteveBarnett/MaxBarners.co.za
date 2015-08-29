<?php
/*
Template Name: Recent Comments
*/
?>

<?php get_header(); ?>

<div id="content" class="recent-comments">

<h4>Recently commented on</h4>

<ul>
<?php if (function_exists('c2c_get_recently_commented')) { ?>

<?php c2c_get_recently_commented ( 
10, 
"<li><a href=\"%post_url%#comments\">%post_excerpt%</a></li>",
'',
'DESC',
0,
'm/d/Y h:i a',
'',
false) ?>

<?php } ?>  



</ul>

</div> <?php end #content ?>

<div id="currently">

Commentage, recently.

</div>	

<?php get_footer(); ?>
