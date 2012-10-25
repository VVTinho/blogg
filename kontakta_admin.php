<!doctype html>
 
<html>
	<head>
		<meta charset="UTF-8">
		<link href="./style/style.css" rel="stylesheet" type="text/css">
		<title>Kontakta admin!</title>
	</head>
 
	<body>
	
		<div id="wrapper">
			<div id="header"><?php include("header.php"); ?></div><!-- end of div id="header" -->
			
			<div id="sidebar"><?php //include("backend_meny.php"); ?></div><!-- end of div id="sidebar" -->
	 

			<div id="content">
				<h2>Du behöver ett lösenord för att administrera sidan!</h2>
				Vänligen kontakta sajtens administratör.
				<br><br>
				<form method="post" action="tack.php">

				<b>Ditt namn :</b><br>
				<input type="text" name="name"><br>
				<b>Din e-postadress:</b><br>
				<input type="e-post" name="e-post"><br>
				<input type="submit" value="Skicka till Admin">

				</form>
				

			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>

