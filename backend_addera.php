<?php include("sec.php"); ?>
<?php
require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)
require_once('functions.php');

$message="";

	if
	( 	isset ($_POST['artist']))
		{

$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);  // databasuppkopplingen = db_conn //
 
if(mysqli_connect_errno()) // om ngt blir fel med databasuppkopplingen //
	{
		echo "Något blev fel med uppkopplingen till databasen.";
		die();
	}	

		$artist = checkInput($_POST['artist']); // CheckInput finns längst ner på sidan //
		$skivtitel = checkInput ($_POST['skivtitel']);
		$recension = ($_POST['recension']);
		//$kategori_id = checkInput ($_POST['kategori_id']);
		$date = checkInput ($_POST['date']);
	
		$sql ="INSERT INTO skivrecensioner (artist, skivtitel, recension, kategori_id, date) VALUES ('$artist' , '$skivtitel', '$recension', $kategori_id, Now())";
	
		//echo $sql; // ANVÄND FÖR ATT TESTA FRÅGAN //
	
		mysqli_query ($db_conn, $sql); //skicka till databasen //
		
		if (mysqli_affected_rows ($db_conn) != -1 ) //om något skickades in till databasen skrivs ett meddelande ut //
	   
	   $message ="<p class='notice'> Skivrecensionen $skivtitel av $artist är tillagd</p>";
	
	}
	
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">

		<title>Nya musikbloggen (Lägg till recension)</title>
 		<link href="./style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="./tinymce/jscripts/tiny_mce/tiny_mce.js" ></script >
		<script type="text/javascript" >
		tinyMCE.init({

				mode : "textareas",

		});
		</script >
	</head>
 
	<body>
 	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?> </div><!-- end of id header -->
		
		<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of id sidebar -->
 

		<div id="content">
		
			<h2>Lägg till en ny skivrecension</h2>
			
			<?php echo $message; ?><br>
			
			<form class="box" action="backend_addera.php" method="post">
		
				<fieldset style="width:715px;">
				<legend><b>Fyll i artist och skivans titel</b></legend><br>
		
				<b>Artist:</b> <br>
				<input type="text" name="artist" style="width: 300px;">
				<br><br>
			
				<b>Skivans titel:</b> <br>
				<input type="text" name="skivtitel" style="width: 300px;">
				<br><br>
	
	<!--				
			<fieldset style="width: 300px;">
				<legend>Välj musikkategori</legend>

					<label for="select"><br />
					Välj kategori här:</label><br />

					<select name="kategori_id">
					<option> Välj kategori här! </option>
					<option value="1">Techno</option>
					<option value="2">Trance</option>
					<option value="3">House</option>
					<option value="4">Klassisk</option>
					<option value="5">Soul</option>
					</select>

			</fieldset>		
		-->	

<!-- PASTE IN HÄR -->		
					<fieldset style="width: 280px;">
						<legend><b>Välj musikkategori</b></legend>
						<select name="kategori_id">
						<option>Välj kategori här! </option>
						<?php 
							$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
							update_dropdown();
							?>
						</select>
					</fieldset>		
					<br>
<!-- PASTE IN HÄR -->		

				<b>Skriv recension:</b><br>
				<textarea name="recension" cols="80" rows="20"></textarea>
				<br>
				<input type="hidden" name="date" value="Now()">
				<br>
				<input type="submit" value="Lägg till ny skivrecension" class="skicka_knapp"> 
				<br>
				<br>
				</fieldset>
			</form>
		
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
