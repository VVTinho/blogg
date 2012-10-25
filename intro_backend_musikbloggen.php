<?php include("sec.php"); ?>
 
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
				Här kommer att finnas information om vad som kan göras i backend.
				<br><br>
				<b>Kvar att göra</b><br><br>

				
				<b>PRIO 1</b><br>
				* Skapa någon slags if-sats på bloggens startsida så att man slipper skapa två sidor (intro+frontend)<br>			
				* Kunna skapa/editera/radera kategorier samtidigt som man editerar en recension<br>					
				* Kunna visa en kategoribild till varje kategori (bilden ska ligga i databasen (i en blob).<br><br>
		
				<b>Bilder</b><br>
				* Kunna lägga upp bilder (thumb på recensionslistningar/stora när man klickat på enskild recension)<br>
				* Visa bildtext på de stora bilderna men inte på de små.<br><br>
				
				<b>Inloggning</b><br>
				* Inloggning för admins från frontend till backend<br>
				* Kunna skapa användare för att kunna skriva kommentarer<br><br>
				
				<b>Längre fram</b><br>
				* Paginering av blogginlägg<br>
				* Sökfunktion<br>
				* Random bilder/texter<br>
				* Kunna påverka CSS (välja bakgrundfärg/fonter etc)<br>
				* Skriva kommentarer till recensionerna<br>
				* Kunna skapa avatar då man kommenterar recensioner<br><br>


			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>

