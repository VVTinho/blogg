<?php include("sec.php"); ?>
<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt) //

$message="";

	if
	( 	isset ($_POST['kategori_namn']))
		{


$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn //
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen //
	{
		echo "Något blev fel med uppkopplingen till databasen.";
		die();
	}	

		$kategori_namn = checkInput($_POST['kategori_namn']); // CheckInput finns längst ner på sidan //
		$kategori_description = checkInput($_POST['kategori_description']); // CheckInput finns längst ner på sidan //

	
		$sql ="INSERT INTO kategorier (kategori_namn, kategori_description) VALUES ('$kategori_namn', '$kategori_description')";
	
		echo $sql; // ANVÄND FÖR ATT TESTA FRÅGAN //
	
		mysqli_query ($db_conn, $sql); //skicka till databasen //
		
		if (mysqli_affected_rows ($db_conn) != -1 ) //om något skickades in till databasen skrivs ett meddelande ut //
	   
	   $message ="<p class='notice'> Kategorin $kategori_namn lades till.</p>";
	
	}
	
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">

		<title>Nya musikbloggen (Lägg till kategori)</title>
 		<link href="./style/style.css" rel="stylesheet" type="text/css">
	</head>
 
	<body>
 	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?> </div><!-- end of id header -->
		
		<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of id sidebar -->
 

		<div id="content">
		
			<h2>Lägg till en ny musikkategori</h2>
			
			<?php echo $message; ?><br>
			
			<form class="box" action="backend_addera_kategorier.php" method="post">
		
				<fieldset style="width:450px;">
				<legend><b>Lägg till ny kategorin</b></legend>
		
				<b>Kategori:</b> <br>
				<input type="text" name="kategori_namn" style="width: 300px;">
				<br>
			
			<!--	<b>Skiv kategoribeskrivning:</b> <br>
					<input type="text" name="kategori_namn" style="width: 300px;">
					<br>
			-->
					<b>Skriv kategoritext:</b><br>
					<textarea name="kategori_description" id="kategori_decription" cols="35" rows="10"></textarea>
			
				
				</fieldset>
			
				<input type="submit" value="Lägg till ny musikkategori" class="skicka_knapp"> 
				<br>
				<br>
				</fieldset>
			</form>
			
						<?php //writePosts($aktuell_kategori) ?>
		
		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>

<?php

function checkInput($string) //funktion som kollar att man ej kan lägga in script samt kan anväda '//
	{
		global $db_conn;
		$string = mysqli_real_escape_string($db_conn, $string);
		$string = htmlentities($string);
		return $string;
	
	}
?>
