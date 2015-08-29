<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>KRASH shots for South African Guide Dogs Association </title>

<style type="text/css">

body {
font: 0.8em 'trebuchet ms', arial;
background: #E9EDF4;
}

img {
border: 0;
}

#wrapper {
width: 80%;
margin: 10px auto 10% auto;
border-style: solid;
border-color: #2F578C;
border-width: 10px 2px 2px 2px;
background: #fff url(bg.gif) bottom left repeat-x;
padding-bottom: 70px;
}

h1 {
text-align: right;
background: #497FC7;
margin: 2px;
padding: 5px;
}

h1 a {
color: #fff;
text-decoration: none;
}


#inner {
margin: 20px;
}

h2 a:hover {
text-decoration: none;
color: #f00;
}


</style>


</head>

<body>

<div id="wrapper">

<?php if (!isset($width)) { $width = 200; } ?>

<h1><a href=".?width=<?php echo $width ?>">KRASH shots for SAGDA</a></h1>

<div id="inner">

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
	foreach ( $dirs as $dir => $numshots) {
	echo '<h2><a href="?viewthumbs=' . $dir . '&width=' . $width . '">' . $dir . '</a> (' . $numshots . ' shots)</h2>';
	}
}



if (isset($viewthumbs)) {

	if ($handle = opendir("./$viewthumbs")) {
		while (false !== ($file = readdir($handle)) ) {
			if ( strpos($file, ".jpg") != false ||  strpos($file, ".JPG") != false ) {
			?>
<a href="<?php echo $viewthumbs; ?>/<?php echo $file; ?>"><img src="<?php echo $viewthumbs; ?>/<?php echo $file; ?>" width="<?php echo $width ?>" alt="<?php echo $file; ?>" /></a>
			<?php
			}
		} // end while
	closedir($handle);
	}

}



/*


// now display the thumbs for the selected dir


if (isset($thumbs)) {


if ($handle = opendir("./$thumbs/thumbs")) {

    while (false !== ($file = readdir($handle)) ) {

    if ($file != "." && $file != ".." && $file != "thumbs" && $file != "index.php" && $file != ".htaccess" && $file != "Thumbs.db" && $file != "Picasa.ini") {

            ?>

            <a href="<?php echo $thumbs; ?>/<?php echo $file; ?>"><img src="<?php echo $thumbs; ?>/thumbs/<?php echo $file; ?>" title="<?php echo $file; ?>" /></a>          
            
        <?php
            

        } // end 2nd if

    } // end while

    closedir($handle);



// end if handle
}


// end if isset thumbs
}

*/

?>

</div>

</div>


</body>

</html>