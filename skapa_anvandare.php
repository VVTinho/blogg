<?php include("sec.php"); ?>
<?php

require_once('conn.php'); // conn.php innehåller uppkopplingsuppgifterna till databasen. Den ska inte finnas i www-mappen (ur säkerhetsaspekt)


if(isset ($_POST['pass']))
{
$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);


$username = $_POST['user'];


//skapa unikt värde för varje användare
$salt = hash('sha256', time() . 'en text!' . strtolower($username));


$hash = $salt . $_POST['pass'];



//om man vill - gör om saltet flera gånger för ökad säkerhet
for ( $i = 0; $i < 100000; $i ++ ) {
  $hash = hash('sha256', $hash);
}

$hash = $salt . $hash;




$hash = mysqli_real_escape_string($con, $hash);
$user = mysqli_real_escape_string($con, $username);





$sql = "insert into usertable (username, pass) VALUES('$user', '$hash')";

mysqli_query($con, $sql);


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
				<h2>Skapa ny användare!</h2>
				Här skapar du en användare
				<br><br>


			<form method="post" action="skapa_anvandare.php">

				Välj användarnamn:<br>
				<input type="text" name="user"><br>
				Välj lösenord<br>
				<input type="password" name="pass"><br>
				<input type="submit" value="Skapa användare">

			</form>
				

			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>



