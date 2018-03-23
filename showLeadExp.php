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
      <h2> Leaders by Expansion </h2>
      <table>
        <tr>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Expansion Title </th>
        </tr>
				<?php
				if(!($stmt = $mysqli->prepare("SELECT leaders.fname, leaders.lname, expansion.title FROM lead_expansion INNER JOIN expansion ON lead_expansion.eid = expansion.id INNER JOIN leaders ON lead_expansion.lid = leaders.id WHERE leaders.id = ?"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!($stmt->bind_param("s",$_POST['leadName']))){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}

				if(!$stmt->bind_result($fname, $lname, $title)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
				 echo "<tr>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $title . "\n</td>\n</tr>";
				}

				$stmt->close();
				?>
			</table> <br>
			<p> <a href="final.php"> Go home. </a> </p>
		</div>
	</body>
</html>
