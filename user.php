<html>

<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
</head>

<body>
<?php

include('config.php');

//$path = "sqlite:/var/www/project/rss.db";
//$db = new PDO($path) or die("Could not open database");

$query = "SELECT id, title, url, count FROM rss";

$result = $db->query($query);
while($row = $result->fetch()) 
{
	
		//echo $row['title'];
		//return;
	
	$xml = simplexml_load_file($row['url']);
	echo $row['title'].'</br>';
	// print descriptions
	for ($x = 0; $x < $row['count']; $x++)
	{
		// for RSS 0.91
	   	if (isset($xml->channel->item)) 
	   	{
	   		$item = $xml->channel->item[$x];
		}
	  	// for RSS 1.0
	    	elseif (isset($xml->item)) 
	    	{
			$item = $xml->item[$x];
		}
	    	echo "<a href=\"$item->link\">$item->title</a><br />$item->description<p />";
	}
	echo "<hr />";

	// reset variables
	unset($xml);
	unset($item);
}
?>

</body>

</html>
