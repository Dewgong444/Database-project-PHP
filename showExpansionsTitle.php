<?php
//using the provided php documents as a template to help.
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","sheltchr-db","psFynBdyT6fved00","sheltchr-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<body>
    <div>
      <h2> Expansion by Title </h2>
      <table>
        <tr>
          <th> Title </th>
          <th> Villain </th>
          <th> Release Date </th>
        </tr>
				<?php
				if(!($stmt = $mysqli->prepare("SELECT expansion.title, expansion.villain, expansion.released FROM expansion WHERE expansion.id = ?"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!($stmt->bind_param("s",$_POST['eTitle']))){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}

				if(!$stmt->bind_result($title, $villain, $release)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
				 echo "<tr>\n<td>\n" . $title . "\n</td>\n<td>\n" . $villain . "\n</td>\n<td>\n" . $release . "\n</td>\n</tr>";
				}

				$stmt->close();
				?>
			</table> <br>
			<p> <a href="final.php"> Go home. </a> </p>
		</div>
	</body>
</html>
