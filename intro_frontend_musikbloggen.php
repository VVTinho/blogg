<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)
require_once('functions.php');

$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen
{
	echo "Något blev fel med uppkopplingen till databasen.";
	die();
}
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">
		<link href="./style/style.css" rel="stylesheet" type="text/css">
		<title>Nya musikbloggen (Frontend)</title>
 
	</head>
 
	<body>
	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?></div><!-- end of div id="header" -->
		
		<div id="sidebar"><?php include("frontend_meny.php"); ?></div><!-- end of div id="sidebar" -->
 

		<div id="content">
			<h2>Välkommen till den här fantastiska bloggen</h2>
			
			<!-- img src="./images/test_storlek.png" alt="bild" -->
			<p>
				Nulla sed nunc quam. Quisque justo velit, dignissim non pretium vestibulum, dictum nec nulla. Integer laoreet 
				eleifend augue, in ornare sem varius sit amet. Nulla auctor dapibus malesuada. Suspendisse dapibus consequat 
				velit vitae vulputate. Donec quis massa ut purus viverra blandit ut id urna. Sed condimentum ipsum vitae 
				turpis suscipit eget laoreet augue euismod. Morbi consectetur nisi quam. Mauris congue, nunc id auctor gravida, 
				mauris magna aliquet turpis, ac rhoncus enim felis a nunc. Maecenas lacinia, arcu nec tristique pharetra, lacus 
				nunc malesuada urna, eu semper libero nisl vel ipsum. Nullam mattis convallis tempus. Donec tempor pretium nulla, 
				ac euismod nibh porta vel. Morbi semper suscipit arcu sed vulputate. 
			</p>
			
			<h2>Här kan du läsa bloggens tre senaste recensioner</h2>

			<?php //writePostsIntroFrontend() ?>
			<?php writePosts_avancerad() ?>

		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>




<?php

/*

//skapa en funktion som fångar ID via GET och sedan en if-sats som säger att om det INTE finns något ID så ska de senaste 5  posterna listas.

function createGallery()
{
	$dbConn = mysqli_connect("localhost", "root", "", "foto");
	if(isset($_GET['cat']))
	{
		$cat = (int) $_GET['cat'];
		$sql = "SELECT imageName, imageID from images where catID = $cat imageID DESC";
	}
	else
	{
		$sql = "SELECT imageName, imageID FROM images order by imageID DESC Limit 0, 20";
	}
	
	$res = mysqli_query($dbConn, $sql);
	echo"<ul>";
	while ($row = mysqli_fetch_assoc($res))
		{
			$id = $row['imageID'];
			$image = $row['imageName'];
			echo "<li><a href='imageDetail.php?id=$id'><img src='generated/thumb_$image'></a></li>";

		}
	
	
	
}//end function

*/
?>