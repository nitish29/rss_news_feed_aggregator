<html>
<head><basefont face = 'Arial'></head>
<body>

<h2>Feed Manager</h2>

<?php
// PHP 5

if (isset($_POST['submit'])) {
    // check form input for errors
    
    // check title
    if (trim($_POST['title']) == '') {

        die('ERROR: Please enter a title');
    }

    // check URL
    if ((trim($_POST['url']) == '') || !ereg("^http\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\._\?\,\'/\\\+&%\$#\=~\-])*$", $_POST['url'])) {

        die('ERROR: Please enter a valid URL');
    }

    // check story number
    if (!is_numeric($_POST['count'])) {

        die('ERROR: Please enter a valid story count');
    }
    include('config.php');

   //$path = "sqlite:/var/www/project/rss.db";
   //$db = new PDO($path) or die("Could not open database");


   
    $query = "INSERT INTO rss (title, url, count) VALUES ('".$_POST['title']."', '".$_POST['url']."', '".$_POST['count']."')";
    $result = $db->query($query);

    

    // print success message
    echo "Item successfully added to the database! Click <a href = 'admin.php'>here</a> to return to the main page";

}
else {
    die('ERROR: Data not correctly submitted');
}

?>

</body>
</html>


