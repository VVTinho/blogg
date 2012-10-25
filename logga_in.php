<?php


if(isset ($_POST['pass']))
{
$con = mysqli_connect("localhost", "root", "", "music2");


$username = $_POST['user'];
$password= $_POST['pass'];
$user = mysqli_real_escape_string($con, $username);
$sql = "SELECT pass from usertable WHERE username = '$user' LIMIT 1";





$res = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($res))
{
	$salt = substr($row['pass'], 0, 64);
	$hash = $salt . $password; 
	for ( $i = 0; $i < 100000; $i ++ ) {
  		$hash = hash('sha256', $hash);
	}
	
	
	
	
} 
else
{
	//echo 'Felaktigt lösenord' . '<br><a href="skapa_anvandare.php">Skapa användare</a>';
	echo 'Felaktigt lösenord';
			   header( 'Location: kontakta_admin.php' ) ;	
	die();
}






if ($salt.$hash == $row['pass'] )
	{

		session_start();
		$_SESSION['inloggad'] ="yes";

		//echo "korrekt!";	
		   header( 'Location: intro_backend_musikbloggen.php' ) ;
		   
	}
else
	{
		//echo "Felaktigt lösenord";
		   header( 'Location: kontakta_admin.php' ) ;		
		die();
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
			
			<div id="sidebar"><?php //include("backend_meny.php"); ?></div><!-- end of div id="sidebar" -->
	 

			<div id="content">
				<h2>Välkommen till musikbloggen Backend!</h2>
				För att kunna redigera/lägga till/radera recensioner måste du logga in!
				<br><br>
				<form method="post" action="logga_in.php">

				<b>Ange användarnamn:</b><br>
				<input type="text" name="user"><br>
				<b>Ange lösenord</b><br>
				<input type="password" name="pass"><br>
				<input type="submit" value="Logga in">

				</form>
				

			</div> <!-- end of div id="content" -->
			
			<div id="footer"><?php include("footer.php"); ?></div> <!-- end of div id="footer" -->
			
		</div> <!-- end of div id="wrapper" -->
	 
	</body>
</html>

