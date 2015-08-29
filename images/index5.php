<html>

<head>

<title>max barners - source images</title>

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


</style>

</head>

<body>

<div id="wrapper">

<?php


// make an array called dirs, values dir names


if ($handle = opendir("./2006")) {

    while (false !== ($file = readdir($handle)) ) {

    if ($file == "07" || $file == "08" || $file == "09" || $file == "10" || $file == "11" || $file == "12") {

	// reset imagecount
	$imagecount = 0;

	
	if ($subhandle = opendir("./2006/$file/thumbs")) {

		while (false !== ($subfile = readdir($subhandle)) ) {

		if ($subfile != "." && $subfile != ".." && $subfile != ".htaccess") {

		$imagecount += 1;		

		} // end sub if

		} // end subhandle while

	}


	$dirs[$file] = $imagecount;


    }
            
    // end if


    } // end while

    closedir($handle);


}







// now use dirs to do listing



if (isset($thumbs)) { }

else {

foreach ($dirs as $dir => $numimages) {

?>

<a href="?thumbs=<?php echo $dir; ?>"><?php echo $dir; ?></a> (<?php echo $numimages; ?>)<br />

<?php

// end foreach
}

// end if else
}





// now display the thumbs for the selected dir


if (isset($thumbs)) {


if ($handle = opendir("/home/sub005/sc10611/maxbarners/images/2006/$thumbs/thumbs")) {

    while (false !== ($file = readdir($handle)) ) {

    if ($file == "07" || $file == "08" || $file == "09" || $file == "10" || $file == "11" || $file == "12") {

            ?>

            <a href="/images/2006/<?php echo $thumbs; ?>/<?php echo $file; ?>"><img src="/images/2006/<?php echo $thumbs; ?>/thumbs/<?php echo $file; ?>" title="<?php echo $file; ?>" /></a>          
            
        <?php
            

        } // end 2nd if

    } // end while

    closedir($handle);



// end if handle
}


// end if isset thumbs
}



?>

</div>


</body>

</html>