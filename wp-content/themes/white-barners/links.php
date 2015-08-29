<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content" class="links">

<h4>Links</h4>

<ul>
<?php wp_list_bookmarks('title_before=<h4>&title_after=</h4>'); ?>
</ul>

</div> <?php end #content ?>

<div id="currently">

Linkery goodness

</div>	

<?php get_footer(); ?>
