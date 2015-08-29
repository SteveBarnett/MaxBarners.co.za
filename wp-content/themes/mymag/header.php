<?php $myOptions = get_option('myOptions'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php
$colour = $myOptions['colour_scheme'];
if($colour == green) {
$style = "green.css";
}
if($colour == orange) {
$style = "orange.css";
}
if($colour == red) {
$style = "red.css";
}
if($colour == purple) {
$style = "purple.css";
}
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<?php if($colour == green || $colour == orange || $colour == red || $colour == purple) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/<?php echo $style;?>" type="text/css" media="screen" />	
<?php } ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.innerfade.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.bottom-slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.li-scroller.1.0.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/custom.js"></script>


<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/ie.css" type="text/css" media="screen" />
<![endif]-->
</head>
<body>
	
<div class="wrapper">
<div id="topmenu">
<div id="search">
	<a href="<?php bloginfo('atom_url'); ?>" class="rss"></a>
	<a href="<?php echo $myOptions['contact_link'];?>" class="contact"></a>
	<form id="searchform" method="get" action="/">
	<input type="text" value="" name="s" id="searchbox" />
	<input type="submit" id="searchbutton" value="" />
</form>
</div>
</div>

<div id="header">
<div id="logo">
<?php if(get_option('logo_pic')) { ?>
<a href="/" title="home"><img src="<?php bloginfo('template_directory'); ?>/images/logos/<?php echo get_option('logo_pic');?>"></a>
<?php } else { ?>
<div id="desc">
<a href="/" title="home"><div class="title"><?php bloginfo('name'); ?></div></a>
<div class="slogan"><?php bloginfo('description'); ?></div>
</div>
<?php } ?>
</div>
<?php if($myOptions['header_banner']) { ?>
<div class="banner_top">
<?php echo stripslashes($myOptions['header_banner']);?>
</div>
<?php }?>
</div>
</div>

<div id="navcontainer">
<div class="navigation">	
<div class="wrapper"> 
        <ul id="navbar">
<?php $exclude = $myOptions['pages_excl'];?>
<?php if(!$myOptions['pages_limit']) {
$limit = '10'; } else {
$limit = $myOptions['pages_limit'];
}
if($myOptions['pages_limit'] == '0') {
$limit = 0;
}
?>
	<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
	<?php wp_list_pages("exclude=$exclude&title_li=&depth=3&number=$limit"); ?>
	</ul> 
</div>
</div>
</div>

<div id="catcontainer">
<div class="cat_navigation">	
<div class="wrapper"> 
        <ul id="catbar">
<?php $exclude = $myOptions['cat_excl'];?>
<?php if(!$myOptions['cat_limit']) {
$limit = '10'; } else {
$limit = $myOptions['cat_limit'];	
}
if($myOptions['cat_limit'] == '0') {
$limit = 0;
}
?>
	<?php wp_list_categories("exclude=$exclude&title_li=&depth=2&number=$limit"); ?>
	</ul>
</div>
</div>
</div>	