<?php
session_start();
if (!isset($_SESSION['inloggad']) )
{
	  header( 'Location: logga_in.php' ) ;	
	  //header( 'Location: skapa_anvandare.php' ) ;	
	
	die();
} 

?>