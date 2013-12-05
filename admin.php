

<html>
<head><basefont face = 'Arial'></head>
<body>
<h2>Feed Manager</h2>

<h4>Current Feeds:</h4>
<table border = '0' cellspacing = '10'>

<?php
// PHP 5

// include configuration file
include('config.php');
//$path = "sqlite:/var/www/project/rss.db";
//$db = new PDO($path) or die("Could not open database");

$query = "SELECT id, title, url, count FROM rss";

$result = $db->query($query);
// if records present

    while ($row = $result->fetch()) {
    ?>

        <tr>
        <td><?php echo $row['title']; ?> (<?php echo $row['count']; ?>)</td>

        <td><font size = '-2'><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></font></td>
        </tr>

    <?php
    }

?>

</table>

<h4>Add New Feed:</h4>
<form action = 'add.php' method = 'post'>
<table border = '0' cellspacing = '5'>
<tr>
    <td>Title</td>

    <td><input type = 'text' name = 'title'></td>
</tr>
<tr>
    <td>Feed URL</td>
    <td><input type = 'text' name = 'url'></td>
</tr>

<tr>
    <td>Stories to display</td>
    <td><input type = 'text' name = 'count' size = '2'></td>
</tr>
<tr>
    <td colspan = '2' align = 'right'><input type = 'submit' name = 'submit' value = 'Add RSS Feed'></td>

</tr>
</table>
</form>

</body>
</html>


