<?php
//Check for Post Thumbnail Support
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

//Function to get Thumbnail URL
function get_thumbnail_src() {
if (function_exists('has_post_thumbnail')) {
$post_thumbnail_id = get_post_thumbnail_id( $post_id );                      
$image_src = wp_get_attachment_image_src( $post_thumbnail_id, $target_size );  
$thumbnail_html = get_the_post_thumbnail( $post_id, $size, $attr );
return $image_src[0];
} elseif(get_post_meta($post->ID, 'featured', TRUE)) {
$img = get_post_meta($post->ID, 'featured', TRUE);
return $img;
} else {
    
}
}

//Limit the Content
function new_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


//Make new excerpt Link
function change_excerpt($content) {
	$content = str_replace('[...]','...',$content); // remove [...], replace with ...
	$content = strip_tags($content); // remove HTML
	return $content;
}
add_filter('the_excerpt','change_excerpt');

//Register Sidebars
register_sidebar(array(
'name' => 'Footer Sidebar',
'description' => 'Widgets in this area will be shown in the center footer column',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>'));
register_sidebar(array(
'name' => 'Home Sidebar',
'description' => 'Widgets in this area will be shown in the Sidebar on Homepage',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>'));
register_sidebar(array(
'name' => 'Sub Sidebar',
'description' => 'Widgets in this area will be shown in the Sidebar on Subpages/Posts/Archives etc.',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>'));

//Styling Tag Cloud
function style_tag_cloud($tags)
{
	$tags = preg_replace_callback("|(class='tag-link-[0-9]+)('.*?)(style='font-size: )([0-9]+)(pt;')|",
		create_function(
			'$match',
			'$low=1; $high=5; $sz=($match[4]-8.0)/(22-8)*($high-$low)+$low; return "{$match[1]} tagsz-{$sz}{$match[2]}";'
		),
		$tags);
	return $tags;
}


//Loading Theme Options Framework

$themename = "myMag";
$shortname = "mag";
$options = array (
array( "type" => "open",
	"title" => "Navigation Settings"
	),
 
array( "name" => "Exclude Pages from Navigation",
       "desc" => "Type in Page IDs you would like to exclude from menu (Seperated by comma).",
       "id" => "pages_excl",
       "type" => "text",
       "std" => ""),

array( "name" => "Limit Pages",
       "desc" => "Type in a number to limit the pages being displayed in the menu. Type 0 to show all the Pages. By default the number of pages is limited to 10",
       "id" => "pages_limit",
       "type" => "text",
       "std" => ""),

array( "name" => "Exclude Categories from Navigation",
       "desc" => "Type in Category IDs you would like to exclude from category menu (Seperated by comma).",
       "id" => "cat_excl",
       "type" => "text",
       "std" => ""),

array( "name" => "Limit Categories",
       "desc" => "Type in a number to limit the categories being displayed in the menu. Type 0 to show all Categories. By default the number of categories is limited to 10",
       "id" => "cat_limit",
       "type" => "text",
       "std" => ""),

array( "type" => "close"),

array( "type" => "open",
	"title" => "Styling Settings"
	),

array( "name" => "Select a colour scheme",
       "desc" => "We have 5 Colour Schemes for you:",
       "id" => "colour_scheme",
       "options" => array("blue", "green", "orange", "red", "purple"),
       "type" => "select",
       "std" => ""),

array( "type" => "close"),

array( "type" => "open",
	"title" => "Homepage Settings"
	),

array( "name" => "Slideshow Category ID",
       "desc" => "This is the category that will be shown in the Slideshow on the frontpage, use comma to seperate multiple IDs",
       "id" => "slide_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Slideshow Number",
       "desc" => "Select the number of posts you want to show in Slideshow, leave empty if you want to show all.",
       "id" => "slide_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Bottom Slideshow Category ID",
       "desc" => "Select the category ID you want to show in the slider right beneath the Slideshow, use comma to seperate multiple IDs",
       "id" => "bottom_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Bottom Slideshow Number",
       "desc" => "Decide how many Posts you would like to show in the Slider. Leave empty to show all.",
       "id" => "bottom_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Recent News Category ID",
       "desc" => "Set the category ID you want to display next to the Slideshow on \"Recent News\". Seperate multiple Categories by comma.",
       "id" => "recent_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Recent News Number",
       "desc" => "Decide how many Posts you would like to show under Recent News. Leave empty to show all.",
       "id" => "recent_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Show Featured Articles with thumbs?",
       "desc" => "Decide wether you like to display featured articles with thumb yes or no!",
       "id" => "show_thumbs",
       "options" => array("yes", "no"),
       "type" => "selectnormal",
       "std" => ""),

array( "name" => "Featured Articles with Thumbs Category ID",
       "desc" => "This sets the category ID for featured Articles with Thumbnails on Homepage.",
       "id" => "feat_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Featured Articles with Thumbs Number",
       "desc" => "Decide how many featured Articles with Thumbnails you would like do display. Leave empty to show all.",
       "id" => "feat_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Show Featured Articles without thumbs?",
       "desc" => "Decide wether you like to display featured articles <strong>without</strong> thumb yes or no!",
       "id" => "show_no_thumbs",
       "options" => array("yes", "no"),
       "type" => "selectnormal",
       "std" => ""),

array( "name" => "Featured Articles without Thumbs Cat ID",
       "desc" => "This sets the category ID for featured Articles <strong>without</strong> Thumbnails on Homepage.",
       "id" => "feat_no_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Featured Articles without Thumbs Number",
       "desc" => "Decide how many featured Articles without Thumbnails you would like do display. Leave empty to show all.",
       "id" => "feat_no_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Show Newsticker?",
       "desc" => "Decide wether you like to display the Newsticker yes or no!",
       "id" => "show_newsticker",
       "options" => array("yes", "no"),
       "type" => "selectnormal",
       "std" => ""),

array( "name" => "Newsticker Category ID",
       "desc" => "Decide which category should be shown in the Newsticker. Seperate multiple categories with comma.",
       "id" => "ticker_cat",
       "type" => "text",
       "std" => ""),

array( "name" => "Newsticker Number",
       "desc" => "Decide how many Articles you would like do display in the Newsticker. Leave empty to show all.",
       "id" => "ticker_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "Link to contact page",
       "desc" => "Type in your link to contact page - For example: http://www.wp-themix.org/contact/",
       "id" => "contact_link",
       "type" => "text",
       "std" => ""),

array( "type" => "close"),

array( "type" => "open",
	"title" => "Advertisting Settings"
	),

array( "name" => "Sidebar 120x600px",
       "desc" => "<span style=\"font-size: 9px; font-style: italic;\">&lt;a href=\"http://wpwebhost.com/affiliate/idevaffiliate.php?id=1073_0_1_32\" target=\"_blank\"&gt; &lt;img border=\"0\" src=\"http://wpwebhost.com/affiliate/banners/wp120x600.gif\" width=\"120\" height=\"600\"&gt;&lt;/a&gt;</span>",
       "id" => "sidebar_banner",
       "type" => "textarea",
       "std" => ""),

array( "name" => "Header 468x60px",
       "desc" => "<span style=\"font-size: 9px; font-style: italic;\">&lt;a href=\"http://wpwebhost.com/affiliate/idevaffiliate.php?id=1073_0_1_32\" target=\"_blank\"&gt; &lt;img border=\"0\" src=\"http://wpwebhost.com/affiliate/banners/wp120x600.gif\" width=\"120\" height=\"600\"&gt;&lt;/a&gt;</span>",
       "id" => "header_banner",
       "type" => "textarea",
       "std" => ""),

array( "type" => "close"),

array( "type" => "open",
	"title" => "Sidebar Settings"
	),

array( "name" => "Featured Articles Category ID",
       "desc" => "This is the category that will be shown on the left side of the Sidebar beneath the Widgets, use comma to seperate multiple IDs",
       "id" => "side_feat",
       "type" => "text",
       "std" => ""),

array( "name" => "Featured Articles Number",
       "desc" => "Decide how many Posts you would like to display in the featured article section of the Sidebar.",
       "id" => "side_posts",
       "type" => "text",
       "std" => ""),

array( "type" => "close"),

array( "type" => "open",
	"title" => "Footer Settings"
	),

array( "name" => "Featured Articles Category ID",
       "desc" => "This is the category that will be shown on the left side of the footer, use comma to seperate multiple IDs",
       "id" => "footer_feat",
       "type" => "text",
       "std" => ""),

array( "name" => "Featured Articles Number",
       "desc" => "Decide how many Posts you would like to display in the featured article section of the footer.",
       "id" => "footer_posts",
       "type" => "text",
       "std" => ""),

array( "name" => "\"About the Website\" Post ID",
       "desc" => "Enter the ID of the post you would like to display on the right side of the footer. The <strong>full</strong> content will be shown!",
       "id" => "about_post",
       "type" => "text",
       "std" => ""),
  
array( "type" => "close")
);


// create the Options page on the admin side
function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
if ( 'save' == $_REQUEST['action'] ) {
 
$myOptions = array();
foreach ($options as $value) {
$myOptions[$value['id']]=$_REQUEST[ $value['id'] ];
}
update_option('myOptions', $myOptions);
if( isset( $_REQUEST[ $value['id'] ] ) ) {
update_option('myOptions', $myOptions);
} else {
delete_option( $value['id'] );
}

header("Location: themes.php?page=functions.php&saved=true");
die;
 
} else if( 'reset' == $_REQUEST['action'] ) {
 
foreach ($options as $value) {
delete_option( $value['id'] ); }
 
header("Location: themes.php?page=functions.php&reset=true");
die;
 
}
}


// Add Options page to the admin menu
add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
 
function mytheme_admin() {
global $themename, $shortname, $options;
?>

<div class="wrap">
<span style="float: left;">
<img src="<?php bloginfo('template_directory') ?>/images/logo.jpg">
</span>
<span style="float: left; margin-left: 150px;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="dennis.nissle@iwebix.de">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="myMag Theme Donation">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="<?php bloginfo('template_directory') ?>/images/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
<span style="float: left; width: 660px; font-size: 11px; margin-left: 10px; margin-top: 10px; margin-bottom: 20px; background-color: #e8e8e8; color: #3b3b3b; border: 1px solid #CCC; padding: 5px; clear: both;">Dontators who donate at least $5 will receive a lifetime backlink from our <a href="http://www.wp-themix.org/supporters/" target="_blank">Supporters</a> Page.
(write an E-Mail with link and linktext to supporters@wp-themix.org if you have made an donation).</span>
<h2 style="clear: both; margin-left: 5px; margin-bottom: 20px;">myMag Theme Settings Page</h2>
<?php 
if ( $_REQUEST['saved'] ) echo '<div id="message" style="float: left; width: 655px; margin-left: 10px;" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" style="float: left; width: 655px; margin-left: 10px;" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>


<?php 
$pathtemp = get_theme_root()."/mymag";
$imagetemp = get_theme_root()."/mymag/images/logos";
if(!is_writeable($pathtemp)) {
?>
<span style="float: left; margin-left: 10px; margin-top: 10px; background-color: #c03725; color: #FFF; padding: 5px;">Thumbnails not working - Please give write permission to Theme (myMag) Folder (755 or 777)</span>
<?php
}
?>
<div class="container" style="clear: both; float: left; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; color: #3b3b3b;">
<?php 
if(!is_writeable($imagetemp)) {
?>
<span style="clear: both; margin-bottom: 10px; float: left; background-color: #c03725; color: #FFF; padding: 5px;">You cannot upload images because the folder "wp-content/themes/mymag/images/logos/ is not writeable please CHMOD this folder to 755 or 777</span>
<?php } ?>
<h3>Custom Logo</h3>
<div style="margin:0;padding:0; float: left;">
<form style="float: left;" action="<?php bloginfo('template_directory') ?>/upload.php" enctype="multipart/form-data" method="post" name="upload">
<input type="file" name="file" /><br />
<input type="hidden" name="url" value="<?php echo get_bloginfo('url');?>"/>
<input type="submit" name="submit" style="margin-top: 10px;" value="Upload" /><br/><br/>
</form>
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Select your Logo to upload. Your Logo should not be higher than 175px. The width can be up to 500px.
</div>
</div>
<form action="options.php" method="post" id="options">
<?php wp_nonce_field('update-options'); ?>

<?php $logo = get_option('logo_pic');?>

<?php if($_GET['pic']) {
$picname = $_GET['pic'];
}
?>
<?php if($_GET['pic'] || get_option('logo_pic')) { ?>
<div class="container" style="clear: both; float: left; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; color: #3b3b3b;">
<?php } ?>
<?php if($_GET['deleted'] && !$_GET['updated']) {
if($_GET['pic']) {
$file = $pathtemp."/images/logos/".$picname;
} else {
$file = $pathtemp."/images/logos/".$logo;   
}
unlink($file);
unset($logo);
unset($picname);
delete_option('logo_pic');
?>
</div>
<?php } ?>

<?php if(!$_GET['deleted']) {?>   
<?php if($_GET['pic']) {?>
<h3>Current Logo</h3>
<input value="<?php echo $picname;?>" name="logo_pic" type="hidden">
<?php update_option('logo_pic', $picname);?>
<img src="<?php echo get_bloginfo('template_directory');?>/images/logos/<?php echo $picname;?>" />
<?php
$url = get_bloginfo('url');
$file = get_option('logo_pic');
$admin = "/wp-admin/themes.php?page=functions.php&deleted=true";?>
<br/><br/><a style="background-color: #dedede; border: 1px solid #CCC; padding: 5px;" href="<?php echo $url,$admin;?>">Delete this image</a>
</div>
<?php } else { ?>
<?php if(get_option('logo_pic')) { ?>
<h3>Current Logo</h3>
<img src="<?php echo get_bloginfo('template_directory');?>/images/logos/<?php echo get_option('logo_pic');?>" />
<input value="<?php echo $logo;?>" name="logo_pic" type="hidden">
<?php
$url = get_bloginfo('url');
$file = get_option('logo_pic');
$admin = "/wp-admin/themes.php?page=functions.php&deleted=true";?>
<br/><br/><a style="background-color: #dedede; border: 1px solid #CCC; padding: 5px;" href="<?php echo $url,$admin;?>">Delete this image</a>
<?php } } }?>
<?php if($_GET['pic'] || get_option('logo_pic')) { ?>
</div>
<?php } ?>
</form>
 
<form method="post">

<?php
//print_r($myOptions);
foreach ($options as $value) {
$myOptions = get_option('myOptions');
switch ( $value['type'] ) {
 
case "open":
?>
<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3><?php echo $value['title']; ?></h3>
<?php break;
 
case "close":
?>
</div>
<?php break;
  
case 'text':
?>
<div style="margin-top:15px; float: left; clear: both;">
<?php echo $value['name']; ?><br/>
<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( $myOptions[$value['id']] != "") { echo $myOptions[$value['id']]; } else { echo $value['std']; } ?>" />
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 15px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
<?php echo $value['desc']; ?>
</div>
<?php
break;
 
case 'textarea':
?>
<div style="margin-top:15px;padding:0; float: left; clear: both;">
<?php echo $value['name']; ?><br/>
<textarea style="width: 200px; height:70px; font-size: 10px; border: 1px solid #b6b6b6;" name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( $myOptions[$value['id']] != "") { echo stripslashes($myOptions[$value['id']]); } else { echo $value['std']; } ?></textarea>
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 25px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
<?php echo $value['desc']; ?>
</div>
 
<?php
break;
 
case 'select':
?>
<div style="margin-top:15px; padding:0; float: left; clear: both;">
<?php echo $value['name']; ?><br/>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if($myOptions[$value['id']] == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 15px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
<?php echo $value['desc']; ?>
<br/>
<img src="<?php echo get_bloginfo('template_directory');?>/images/blue.jpg"/><span style="position: relative; margin: 0px 5px 0px 5px; top: -10px;">Blue</span><img src="<?php echo get_bloginfo('template_directory');?>/images/green.jpg"/><span style="position: relative; margin: 0px 5px 0px 5px; top: -10px;">Green</span>  
<img src="<?php echo get_bloginfo('template_directory');?>/images/orange.jpg"/><span style="position: relative; margin: 0px 5px 0px 5px; top: -10px;">Orange</span><br/>
<img src="<?php echo get_bloginfo('template_directory');?>/images/red.jpg"/><span style="position: relative; margin: 0px 5px 0px 5px; top: -10px;">Red</span>
<img src="<?php echo get_bloginfo('template_directory');?>/images/purple.jpg"/><span style="position: relative; margin: 0px 5px 0px 5px; top: -10px;">Purple</span><br/>
Select the one you like best.
</div>
<?php
break;

case 'selectnormal':
?>
<div style="margin-top:15px; padding:0; float: left; clear: both;">
<?php echo $value['name']; ?><br/>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if($myOptions[$value['id']] == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 15px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
<?php echo $value['desc']; ?>
</div>
<?php
break;
 
case "checkbox":
?>
<div style="margin-top:15px; padding:0; float: left; clear: both;">
<?php echo $value['name']; ?><br/>
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 15px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
<?php echo $value['desc']; ?>
</div>
 
<?php break;
 
}
}
?>
<div class="container" style="clear: both; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;"> 
<p class="submit" style="float: left; margin-right: 20px;">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');
?>