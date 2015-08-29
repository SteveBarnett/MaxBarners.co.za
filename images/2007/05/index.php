<html>

<head>

<title>max barners</title>

<style type="text/css">

body {
margin: 0;
padding: 0;
background: #eee;
}

img {
border: 0;
}

#wrapper {
margin: 20px auto;
width: 600px;
background: #fff;
border: 2px solid #ddd;
border-width: 5px 2px 2px 2px;
padding: 2em;
}

a {
color: #666;
}

ul {
margin: 0;
padding: 0;
list-style: none;
}


</style>

</head>

<body>

<div id="wrapper">

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