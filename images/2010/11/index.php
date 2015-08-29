<?php 
$viewthumbs=$_GET['viewthumbs']; 

$current_uri = $_SERVER[REQUEST_URI]; 
$current_explosion = explode('/',$current_uri);
$year = $current_explosion[2];
$month = $current_explosion[3];

?>
<html>

<head>

<title>Max Barners - <?php echo $month ?>/<?php echo $year; ?> <?php if (!isset($viewthumbs)) { echo "- " . $viewthumbs; } ?></title>

<style type="text/css">

body {
margin: 0;
padding: 0;
background: #fff;
font-family: georgia, serif;
}

img {
border: 0;
}

#wrapper {
margin: 40px auto;
width: 66%;
background: #fff;
border: 1px solid #ddd;
padding: 2em 4em;
}

h1 {
margin: -2em -4em 2em -4em;
font-size: 1em;
border-bottom: solid 1px #ddd;
text-align: center;
text-transform: uppercase;
padding: 3px 0;
}

a {
color: #666;
text-decoration: none;
}

a:hover {
text-decoration: underline;
}

ul {
margin: 0;
padding: 0;
}

</style>

</head>

<body>

<div id="wrapper">

<?php
if (isset($viewthumbs)) {
	?>
	<h1><?php echo $month ?>/<?php echo $year; ?>: <?php echo $viewthumbs; ?></h1>
	<?php
}

else {
	?>
	<h1>Images taken <?php echo $month ?>/<?php echo $year; ?></h1>
	<?php
}
?>

<?php

if ($handle = opendir(".")) {
	while (false !== ($file = readdir($handle)) ) {
		if ( strpos($file, ".") === false ) {
		
		$imagecount = 0;
			if ($subhandle = opendir("./$file")) {
				while (false !== ($subfile = readdir($subhandle)) ) {
					if ( strpos($subfile, ".jpg") != false ||  strpos($subfile, ".JPG") != false ) {
					$imagecount += 1;		
					} // end sub if
				} // end subhandle while
			}

	$dirs[$file] = $imagecount;
		}
	} // end while
closedir($handle);
}

if (!isset($viewthumbs)) {
	echo '<ul>';
	foreach ( $dirs as $dir => $numshots) {
	echo '<li><a href="?viewthumbs=' . $dir . '">' . $dir . '</a> (' . $numshots . ')</li>';
	}
	echo '</ul>';
}



if (isset($viewthumbs)) {

	if ($handle = opendir("./$viewthumbs")) {
		while (false !== ($file = readdir($handle)) ) {
			if ( strpos($file, ".jpg") != false ||  strpos($file, ".JPG") != false ) {
			?>
<a href="<?php echo $viewthumbs; ?>/<?php echo $file; ?>"><img src="<?php echo $viewthumbs; ?>/thumbs/<?php echo $file; ?>" alt="<?php echo $file; ?>" /></a>
			<?php
			}
		} // end while
	closedir($handle);
	}

}

?>

</div>


</body>

</html>