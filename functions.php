<?php // function writePosts($aktuell_kategori)
 

function writePosts($aktuell_kategori)
	{
		global $db_conn;
		
			$aktuell_kategori = (int) $_GET['ID']; //fångar upp ID i fältet
				if($aktuell_kategori == 0 ) // om det inte finns något id så listas ID1
						{
							$aktuell_kategori = 1;
						}
		$sql = "SELECT * FROM `skivrecensioner` INNER JOIN kategorier ON skivrecensioner.kategori_id = kategorier.kategori_id WHERE skivrecensioner.kategori_id =$aktuell_kategori ORDER BY date DESC";
		
		$res = mysqli_query ($db_conn, $sql);
 
 
		while ( $row = mysqli_fetch_assoc($res) )
			{

				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$date = $row['date'];
				$recension = $row['recension'];
				//$kategori_namn =$row['kategori_namn'];
 
				echo '<div class="box"><b>' . $artist . ' - ' . $skivtitel . '</b><br>';
				echo '<i>Skivan recenserades: ' . $date . '</i><br>';
				echo '<p>' . $recension . '</p>';
				//echo $kategori_namn;
				echo '</div><br>';
			}
 
	}
 
?>

<?php // function writePostsMeny()
 

function writePostsMeny()
	{
		global $db_conn;
		
			//$aktuell_kategori = (int) $_GET['ID']; //fångar upp ID i fältet

		$sql = "SELECT * FROM kategorier"; 

		$res = mysqli_query ($db_conn, $sql);
 
 
		while ( $row = mysqli_fetch_assoc($res) )
			{

				$kategori_namn = $row['kategori_namn'];
				$kategori_id = $row['kategori_id'];
 
				//echo '<ul>';
				echo '<li><a href="frontend_musikbloggen.php?ID=' . $kategori_id . '">' . $kategori_namn . '</a></li>';
				//echo '</ul>';

			}
 
	}
 
?>

<?php // function writePostsIntroFrontend()
 

function writePostsIntroFrontend()
	{
		global $db_conn;
		
		$sql = "SELECT * FROM skivrecensioner ORDER BY date DESC LIMIT 0, 3"; 
 
		$res = mysqli_query ($db_conn, $sql);
 
 
		while ( $row = mysqli_fetch_assoc($res) )
			{
				$recension_id = $row['recension_id'];
				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$date = $row['date'];
				$recension = $row['recension'];
				$kategori_id = $row['kategori_id'];
				//$kategori_namn =$row['kategori_namn'];
 
				echo '<div class="box"><b>' . $artist . ' - ' . $skivtitel . '</b><br>';
				echo '<i>Skivan recenserades: ' . $date . '</i><br>';
				echo '<p>' . $recension . '</p>';
				//echo 'Kategori: ' . $kategori_namn;
				echo '</div><br>';
 
			}
 
	}
 
?>

<?php //  function skriv_aktuell_kategori()
 
 function skriv_aktuell_kategori ()
	{
		global $db_conn;
		
		$aktuell_kategori = (int) $_GET['ID']; //fångar upp ID i fältet

		$sql = "SELECT * FROM kategorier WHERE kategori_id = $aktuell_kategori"; 

		$res = mysqli_query ($db_conn, $sql);
		
		while ( $row = mysqli_fetch_assoc($res) )


			{
			$kategori_namn = $row['kategori_namn'];
			//$kategori_bild = $row['kategori_bild'];
			$kategori_description = $row['kategori_description'];
			}


		echo '<h2>' . $kategori_namn .'</h2>';


		//echo $kategori_bild;


		echo '<p><i>' . $kategori_description . '</i></p>';
	}
 
?>

<?php // function writePosts_editera()
 
function writePosts_editera()
	{
		global $db_conn;
 
		$sql = "SELECT recension_id, artist, skivtitel, date FROM skivrecensioner ORDER BY date DESC";
 
		$res = mysqli_query ($db_conn, $sql);
 
		while ( $row = mysqli_fetch_assoc($res) )
			{
				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$recension_id = $row['recension_id'];
				$date = $row['date'];
				
			
				//NEDAN FÖR ATT UPPDATERA
				echo "<form  method='post' action='backend_editera_recension.php'>";
				echo "<label>$artist - $skivtitel - (Recenserad: $date)</label>";
				echo "<input type='hidden' name='recension_id' value='$recension_id'>";
				echo "<input type='submit' value='Uppdatera följande recension' class='skicka_knapp'>";
				echo "<br><br>";			
				echo "</form>";
			}
	}
 
?>

<?php // 	function safeInsert($string)
	function safeInsert($string)
		{
			global $db_conn;
			
			$string = htmlentities($string);
			
			$string = mysqli_real_escape_string($db_conn, $string);
					
			return $string;
		}
?>	

<?php //function writePosts_del()
 
function writePosts_del()
	{
		global $db_conn;
 
		$sql = "SELECT * FROM skivrecensioner";
 
		$res = mysqli_query ($db_conn, $sql);
 
		while ( $row = mysqli_fetch_assoc($res) )
			{
				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$recension_id = $row['recension_id'];

			
			// NEDAN FÖR ATT RADERA 
			echo "<form onsubmit='return displayWarning();' method='post' action='backend_radera.php'>";
			echo "<label>$artist - $skivtitel</label>";
			echo "<input type='hidden' name='recension_id' value='$recension_id'>";
			echo "<input type='submit' value='Radera skivrecensionen' class='skicka_knapp'>";
			echo "<br><br>";
			echo "</form>";
			

			}
 
	}
 
?>

<?php //function update_dropdown()

function update_dropdown()
	{
		global $db_conn;

		$sql ="SELECT kategori_id, kategori_namn FROM kategorier";

		$res = mysqli_query($db_conn, $sql);
		
		//echo $sql;
 
			while ( $row = mysqli_fetch_assoc($res) )
			{
				$kategori_id = $row['kategori_id'];
				$kategori_namn = $row['kategori_namn'];
				
				echo '<option value="' . $kategori_id. '">' . $kategori_namn. '</option>';
				//echo $kategori_namn;
			}

	}
?>
 
<?php //function writePosts_avancerad()

function writePosts_avancerad()


{
	global $db_conn;
	//$db_conn = mysqli_connect("localhost", "root", "", "music2");
	if(isset($_GET['ID']))
	{

		$aktuell_kategori = (int) $_GET['ID'];
		$sql = "SELECT * FROM `skivrecensioner` INNER JOIN kategorier ON skivrecensioner.kategori_id = kategorier.kategori_id WHERE skivrecensioner.kategori_id =$aktuell_kategori ORDER BY date DESC";
		$res = mysqli_query($db_conn, $sql);
	}
	else
	{
		$sql = "SELECT * FROM `skivrecensioner` INNER JOIN kategorier ON skivrecensioner.kategori_id = kategorier.kategori_id ORDER BY date DESC LIMIT 0, 3";
		$res = mysqli_query($db_conn, $sql);
	}
	
	while ($row = mysqli_fetch_assoc($res))
		{
			//$recension = $row['recension'];
			//$kategori_namn = $row['kategori_namn'];
				
				$recension_id = $row['recension_id'];
				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$date = $row['date'];
				$recension = $row['recension'];
				$kategori_id = $row['kategori_id'];
				//$kategori_namn =$row['kategori_namn'];
			
			//echo $sql . '<br><br><br><br>';
			//echo '$recension' . ' ' . '$kategori_namn';
			
				echo '<div class="box"><b>' . $artist . ' - ' . $skivtitel . '</b><br>';
				echo '<i>Skivan recenserades: ' . $date . '</i><br>';
				echo '<p>' . $recension . '</p>';
				//echo 'Kategori: ' . $kategori_namn;
				echo '</div><br>';

		}
}



?>


<?php



//skapa en funktion som fångar ID via GET och sedan en if-sats som säger att om det INTE finns något ID så ska de senaste 5  posterna listas.

function writePosts_avancerad2()


{
	global $db_conn;
	//$db_conn = mysqli_connect("localhost", "root", "", "music2");
	if(isset($_GET['ID']))
	{

?> Aktuell kategori
<?php

		$aktuell_kategori = (int) $_GET['ID'];
		$sql = "SELECT * FROM `skivrecensioner` INNER JOIN kategorier ON skivrecensioner.kategori_id = kategorier.kategori_id WHERE skivrecensioner.kategori_id =$aktuell_kategori ORDER BY date DESC";
		$res = mysqli_query($db_conn, $sql);
	}
	else
	{
?> Okänd kategori
<?php
		$sql = "SELECT * FROM `skivrecensioner` INNER JOIN kategorier ON skivrecensioner.kategori_id = kategorier.kategori_id ORDER BY date DESC LIMIT 0, 3";
		$res = mysqli_query($db_conn, $sql);
	}
	
	while ($row = mysqli_fetch_assoc($res))
		{
			//$recension = $row['recension'];
			//$kategori_namn = $row['kategori_namn'];
				
				$recension_id = $row['recension_id'];
				$artist = $row['artist'];
				$skivtitel = $row['skivtitel'];
				$date = $row['date'];
				$recension = $row['recension'];
				$kategori_id = $row['kategori_id'];
				//$kategori_namn =$row['kategori_namn'];
			
			//echo $sql . '<br><br><br><br>';
			//echo '$recension' . ' ' . '$kategori_namn';
			
				echo '<div class="box"><b>' . $artist . ' - ' . $skivtitel . '</b><br>';
				echo '<i>Skivan recenserades: ' . $date . '</i><br>';
				echo '<p>' . $recension . '</p>';
				//echo 'Kategori: ' . $kategori_namn;
				echo '</div><br>';

		}
}



?>