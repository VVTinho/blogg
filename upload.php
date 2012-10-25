<?php

require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)

function saveImgNameToDB($imgName)
	{
		$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	 
		$description = $_POST['description'];
		$description = htmlentities($description);
		$description = mysqli_real_escape_string($dbConn,$description);
	 
		$imgName = htmlentities($imgName);
		$imgName = mysqli_real_escape_string($dbConn,$imgName);
	 
		$sql = "INSERT INTO bilder (description, imagename) VALUES ('$description', '$imgName')";
			
			mysqli_query($dbConn, $sql);
	 
		//echo "Du sparade $imgName";

	}
 
 
function validateImage()
	{
		$allowedFormats = array (".jpg", ".png", ".gif");
		 
		$filnamn = basename( $_FILES['filen']['name'] );
		 
		$antalTecken = strlen($filnamn);
		 
		$filFormat = substr ($filnamn,  $antalTecken-4,4);
		 
		if ( ! in_array($filFormat, $allowedFormats) )
		{
			return false;
		}
		else
		{
			return true;
		}
	}
 
 
if (isset($_FILES['filen']))
{
 
if (validateImage())
	{
	 if ( move_uploaded_file($_FILES['filen']['tmp_name'], basename( $_FILES['filen']['name'] )) )
			{
				$img = basename( $_FILES['filen']['name']);
				//make_thumb($img, "thumb/". $img,50);
				saveImgNameToDB(basename( $_FILES['filen']['name']));
			}	
	}
		else
		{
			echo "Filen inte godkänd";
		}
	}

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
			
			<div id="sidebar"><?php include("backend_meny.php"); ?></div><!-- end of div id="sidebar" -->
	 

			<div id="content">
			
					<?php include('./galleri/menu.html'); ?>
				
					<h2>Lägg upp bild</h2>
	
<form method="post" action="upload.php" enctype="multipart/form-data">
Lägg upp din bild:<br><input type="file" name="filen" ><br><br>

Skriv en kort bildbeskrivning:<br>
<textarea name="description"></textarea><br>
<input type="submit" value="ladda upp">
 
</form>


			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>








<?php
/*
 
function make_thumb($src,$dest,$desired_width)
    {
 
    // read the source image 
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
 
    // find the "desired height" of this thumbnail, relative to the desired width 
    $desired_height = floor($height*($desired_width/$width));
 
    // create a new, "virtual" image 
    $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
 
    // copy source image at a resized size 
    imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
 
    // create the physical thumbnail image to its destination 
    imagejpeg($virtual_image,$dest, 83);
    }
 
 */
?>