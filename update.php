<?php

    $content = $_GET['content']; 

    $myfile = fopen("dishes.xml", "w") or die("Unable to open file!");
    fwrite($myfile, $content);

    fclose($myfile);
?>