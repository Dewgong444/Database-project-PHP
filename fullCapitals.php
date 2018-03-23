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
			<h2> Capital Cities of World of Warcraft </h2>
      <table>
        <tr>
          <th> Name </th>
          <th> Continent </th>
          <th> Number of Districts</th>
        </tr>
        <?php
        if(!($stmt = $mysqli->prepare("SELECT name, continent, districts FROM capital"))){
        	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
        	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($name, $continent, $districts)){
        	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
         echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $continent . "\n</td>\n<td>\n" . $districts . "\n</td>\n</tr>";
        }
        $stmt->close();
        ?>
			</table> <br>
			<p> <a href="final.php"> Go home. </a> </p>
		</div>
	</body>
</html>
