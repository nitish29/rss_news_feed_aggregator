<html>
<head><basefont face = 'Arial'></head>
<body>

<h2>Feed Manager</h2>

<?php

// PHP 5

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // include configuration file

    include('config.php');
    
    // open database file
    //$path = "sqlite:/var/www/project/rss.db";
   //$db = new PDO($path) or die("Could not open database");
    

   
    $query = "DELETE FROM rss WHERE id = '".$_GET['id']."'";
     $result = $db->query($query);
   
    
  

    // print success message
    echo "Item successfully removed from the database! Click <a href = 'admin.php'>here</a> to return to the main page";

}
else {
    die('ERROR: Data not correctly submitted');
}

?>

</body>
</html>
