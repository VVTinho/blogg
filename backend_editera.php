<?php include("sec.php"); ?>
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
		<title>Nya musikbloggen (Backend editera)</title>
 
	</head>
 
	<body>
	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?></div><!-- end of div id="header" -->
		
		<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of div id="sidebar" -->
 

		<div id="content">
			<h2>Välj vilken recension du vill ändra</h2>
			
				<?php writePosts_editera(); ?>
			

		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>

