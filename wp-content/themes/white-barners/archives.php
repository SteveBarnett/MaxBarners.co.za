<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="archives">

<h4>Archives by month</h4>
<ul>
<?php wp_get_archives('type=monthly&show_post_count=1');  ?>
</ul>

<h4>Tags(ish) - 2010</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=490'); ?>
</ul>

<h4>Tags (2009)</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=411'); ?>
</ul>

<h4>Tags (2008)</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=320'); ?>
</ul>

<h4>Tags (2007)</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=64'); ?>
</ul>

<h4>Tags (2006)</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=6'); ?>
</ul>

<h4>Albums (2005)</h4>
<ul>
<?php wp_list_categories('title_li=&show_count=1&child_of=4'); ?>
</ul>

</div> <?php end #content ?>

<div id="currently">
Archivey goodness
</div>	


<?php get_footer(); ?>
