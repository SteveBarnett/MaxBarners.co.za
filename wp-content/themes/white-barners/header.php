<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> - RSS 2 feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Atom feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2 feed - comments" href="<?php bloginfo('comments_rss2_url'); ?>" />

<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

<?php wp_head(); ?>

<?php remove_filter('the_excerpt', 'wpautop'); ?>

</head>

<body<?php 
if (is_home()) { echo ' id="home"'; } 
elseif (is_single()) { echo ' id="single"'; }
?>>

<h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>

<div id="wrapper">