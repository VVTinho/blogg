<?php include("sec.php"); ?>
<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt) //
require_once('functions.php');

$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn //
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen //
	{
		echo "Något blev fel med uppkopplingen till databasen.";
		die();
	}	

	if(isset($_POST['recension_id'])) // om 
		{ 
			$recension_id = (int) $_POST['recension_id'];
			$sql ="DELETE FROM skivrecensioner WHERE recension_id = $recension_id";
	 
			mysqli_query($db_conn, $sql);
		
			//echo $sql; //DEN HÄR TAS BORT EFTER TEST
		}	
	
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">

		<title>Nya musikbloggen (Radera recension)</title>
 		<link href="./style/style.css" rel="stylesheet" type="text/css">
		
			<script>
				function displayWarning()
				{
					var answer = confirm("Vill du verkligen radera recensionen? Du kommer inte att kunna ångra dig.");
						if (answer)
							{
								return true;
							}
						else
							{
								return false;
							}
				}
			</script>

	</head>
 
	<body>
 	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?></div><!-- end of id header -->
		
		<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of id sidebar -->
 

		<div id="content">
		
			<h2>Radera recension</h2>
			
				<?php 
								// skriver ut writePosts som finns längst ner på sidan
				writePosts_del();
				
				?> 
			
		
		
		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>

