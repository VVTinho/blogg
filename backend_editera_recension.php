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

	$recension_id = (int) $_POST['recension_id']; //fånga record_id
	
		if (isset ($_POST['skivtitel']))
			{
				$skivtitel = safeInsert ($_POST['skivtitel']);
				$artist = safeInsert ($_POST['artist']);
				$recension = ($_POST['recension']);
				
				$sql ="UPDATE skivrecensioner SET skivtitel ='$skivtitel' , artist='$artist', recension='$recension' WHERE recension_id = $recension_id";
				 mysqli_query($db_conn, $sql);
				//echo $sql;
			}
	
		//$sql ="SELECT * FROM skivrecensioner WHERE recension_id = $recension_id";
		$sql ="SELECT * FROM skivrecensioner INNER JOIN kategorier ON skivrecensioner.kategori_id=kategorier.kategori_id WHERE recension_id = $recension_id";
	//echo $sql;
	$res = mysqli_query($db_conn, $sql);
 
	if ($row = mysqli_fetch_assoc($res))
	{
	$artist = $row['artist'];
	$skivtitel = $row['skivtitel'];
	$recension = $row['recension'];
	$kategori_namn = $row['kategori_namn'];
	}
?>

<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">
		<link href="./style/style.css" rel="stylesheet" type="text/css">
		<title>Nya musikbloggen (Backend editera)</title>
		<script type="text/javascript" src="./tinymce/jscripts/tiny_mce/tiny_mce.js" ></script >
		<script type="text/javascript" >
		tinyMCE.init({

				mode : "textareas",

		});
		</script >
 
	</head>
 
	<body>
	
	<div id="wrapper">
		<div id="header"><?php include("header.php"); ?> </div><!-- end of div id="header" -->
		
		<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of div id="sidebar" -->
 

		<div id="content">
				<h2>Uppdatera skivrecension</h2>
 
		<form method="post" action="backend_editera_recension.php">
		Artist<br>
		<input type="text" name="artist" size="40" value="<?php echo $artist; ?>">
		<br>
		Skiva<br>
		<input type="text" name="skivtitel" size="40" value="<?php echo $skivtitel; ?>">
		<br>
		<input type="hidden" name="recension_id" value="<?php echo $recension_id; ?>">
		<br>
		Skivrecensionen ligger under kategorin:
		<!--input type="text" name="kategori_namn" value="--><?php echo $kategori_namn; ?>
		<br><br>
		<textarea name="recension" id="recension" cols="60" rows="20"><?php echo $recension; ?></textarea>
		<br><br>
		<input type="submit" value="Uppdatera recensionen" class="skicka_knapp">
		<br><br>
		</form>
		</div> <!-- end of div id="content" -->
		
		<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
		
	</div> <!-- end of div id="wrapper" -->
 
</body>
 
</html>


	
