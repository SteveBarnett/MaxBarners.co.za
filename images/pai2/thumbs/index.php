<?php

if ($handle = opendir(".")) {

    while (false !== ($file = readdir($handle)) ) {

        if ($file != "." && $file != ".." && $file != "index.php") {

            ?>

            <a href="../<?php echo $file; ?>"><img src="<?php echo $file; ?>" title="<?php echo $file; ?>" alt="<?php echo $file; ?>" /></a>          
            
        <?php
            

        } // end 2nd if

    } // end while

    closedir($handle);



}


?>
