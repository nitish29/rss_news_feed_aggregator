<?php

   $path = "sqlite:/var/www/project/rss.db";
   $db = new PDO($path) or die("Could not open database");
   
?>
