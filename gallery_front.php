<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)
require_once("functions.php");
$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen
	{
		echo "Något blev fel med uppkopplingen till databasen.";
		die();
	}	
$sql ="select imagename, description from bilder order by imageID DESC";
 
 $res = mysqli_query($db_conn, $sql);
?>
  
<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">
		<link href="./style/style.css" rel="stylesheet" type="text/css">
		<title>Nya musikbloggen (Backend)</title>
	</head>
 
	<body>
	
		<div id="wrapper">
			<div id="header"><?php include("header.php"); ?></div><!-- end of div id="header" -->
			
			<div id="sidebar"><?php include("frontend_meny.php"); ?></div><!-- end of div id="sidebar" -->
	 

			<div id="content">
			
	
	<h2>(Galleri) Några konsertbilder</h2>
	
<?php
 
while ( $row = mysqli_fetch_assoc($res))
{
	$img = $row['imagename'];
	$description = $row['description'];
	
	//echo "<a href='$img'>"; //om man vill att thumbs länkas till de stora bilderna
	//echo "<img src='thumb/$img'>"; //om man vill lista thumb
	echo "<img src='$img'>"; //om man vill lista de stora bilderna
	echo "</a>";
	echo '<p><i>Bildbeskrivning: </i>' . $description . '</p>';
	echo "<hr>";
}
 
 
 
?>

			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>
