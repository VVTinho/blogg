<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)
require_once("functions.php");
$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen
	{
		echo "Något blev fel med uppkopplingen till databasen.";
		die();
	}	
	
	$aktuell_kategori = (int) $_GET['ID']; //fångar upp ID i fältet
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">

		<title>Nya musikbloggen (Frontend)</title>
 		<link href="./style/style.css" rel="stylesheet" type="text/css">
	</head>
 
	<body>
 	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?></div><!-- end of id header -->
		
		<div id="sidebar"><?php include("frontend_meny.php"); ?></div><!-- end of id sidebar -->

		<div id="content">
			<?php skriv_aktuell_kategori ($aktuell_kategori) ?>
	
			<?php writePosts($aktuell_kategori) ?>

			


		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>


