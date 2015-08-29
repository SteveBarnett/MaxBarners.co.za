<html>

<head>

<title>max barners - source images</title>

<style type="text/css">

body {
margin: 0;
padding: 0;
background: #eee;
font: 0.9em 'trebuchet ms', sans-serif;
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

h1 {
text-align: right;
}

h2 {
text-align: center;
}

h3 {
text-align: left;
}

a {
color: #666;
}

img {
margin: 10px;
}

</style>

</head>

<body>

<div id="wrapper">

<h1>2006</h1>

<?php

if (isset($thumbs)) {

echo '<h2>' . $thumbs . '</h2>';

$thumbslist = scandir('./' . $thumbs . '/thumbs/');

	foreach ($thumbslist as $thumb) {
		if (preg_match('/.jpg/',$thumb)) {
		echo '<a href="./' . $thumbs . '/' . $thumb . '"><img src="./' . $thumbs . '/thumbs/' . $thumb . '" /></a>';
		}
	}

}

else {

	$allthemonths = array ('07', '08');

	// foreach month
	foreach ($allthemonths as $onemonth) {
	echo '<h2>' . $onemonth . '</h2>';

		// if the month exists
		if(file_exists('./' . $onemonth . '/')) {
		$thismonths = scandir('./' . $onemonth . '/');

			// foreach directory in the current month	
			foreach ($thismonths as $thismonthdir) {
				if(preg_match('/.../',$thismonthdir)) {
				
				$grr = scandir('./' . $onemonth . '/' . $thismonthdir . '/thumbs/');
				$numshots = 0;
				foreach ($grr as $grrling) {
					if (preg_match('/.jpg/',$grrling)) {
					$numshots++;
					}
				}
				
				echo '<a href="?thumbs=' . $onemonth . '/' . $thismonthdir . '">' . $thismonthdir . '</a> (' . $numshots . ')<br />';
				
				}		
			}	
		}

	}
}


?>

</div>


</body>

</html>