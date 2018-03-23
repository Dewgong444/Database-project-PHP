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
			<p> To see information on a topic from the game World of Warcraft, click a link below: </p>
			<p> <a href="fullRaces.php"> The races! </a> </p>
			<p> <a href="fullExpansions.php"> The Expansions! </a> </p>
			<p> <a href="fullLeaders.php"> The leaders! </a> </p>
			<p> <a href="fullCapitals.php"> The capital cities! </a> </p>
			<p> <a href="fullLeaderExpansions.php"> When which leaders were active during which expansions! </a> </p>
		</div>
		<br>
		<h3> View Specific Information: </h3>
		<div>
			<p> View Race by Allegiance (please enter "Alliance", "Horde", or "Neutral"): </p>
				<form method = "post" action = "showAllegiance.php">
					<fieldset>
						<p>Allegiance: <input type="text" name="ally" required></p>
						<input type = "submit">
					</fieldset>
				</form>
			<p> View Race by Capital: </p>
				<form method = "post" action = "showRaceCapital.php">
					<fieldset>
						<p> Capital City:
						<select name="cName">
							<?php
							//this should display a drop-down of all city names to select from
							if(!($stmt = $mysqli->prepare("SELECT id, name FROM capital"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $cname)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $cname . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<input type = "submit">
					</fieldset>
				</form>
			<p> View Race by Expansion Introduction: </p>
				<form method = "post" action = "showRaceExp.php">
					<fieldset>
						<p> Expansion Title:
						<select name="eTitle">
							<?php
							//this should display a drop-down of all expansion titles.
							if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $title)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<input type = "submit">
					</fieldset>
				</form>
			<p> View Expansion by Title: </p>
				<form method = "post" action = "showExpansionsTitle.php">
					<fieldset>
						<p> Expansion Title:
						<select name="eTitle">
							<?php
							//this should display a drop-down of all expansion titles
							if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $title)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<input type = "submit">
					</fieldset>
				</form>
			<p> View Capital by Name: </p>
				<form method = "post" action = "showCapitalName.php">
					<fieldset>
						<p> Capital:
						<select name="cName">
							<?php
							//this should display a drop-down of all city names
							if(!($stmt = $mysqli->prepare("SELECT id, name FROM capital"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $cname)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $cname . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<input type = "submit">
					</fieldset>
				</form>
			<p> View Leaders by Race: </p>
				<form method = "post" action = "showLeaderRace.php">
					<fieldset>
						<p> Race Name:
						<select name="rName">
							<?php
							//this should display a drop-down of all the races.
							if(!($stmt = $mysqli->prepare("SELECT id, name FROM race"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $cname)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $cname . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
			<p> View Leaders that were Active during an Expansion: </p>
				<form method = "post" action = "showExpLead.php">
					<fieldset>
						<p> Expansion Title:
						<select name="eTitle">
							<?php
							//this should display a drop-down of all expansion titles
							if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $title)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
			<p> View Expansions when a Particular Leader was Active: </p>
				<form method = "post" action = "showLeadExp.php">
					<fieldset>
						<p> Race Name:
						<select name="leadName">
							<?php
							//this should display a drop-down of all leaders first and last names.
							if(!($stmt = $mysqli->prepare("SELECT id, fname, lname FROM leaders"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $fname, $lname)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
		</div>
		<h3> Add Information to the Database: </h3>
		<div>
			<p> Add to the Capital Cities: </p>
				<form method = "post" action = "addCapital.php">
					<fieldset>
						<p> City Name : <input type = "text" name = "cityName" required></p>
						<p> Which Continent: <input type = "text" name = "contName" required></p>
						<p> Number of Districts: <input type = "text" name = "distNum" required></p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
			<p> Add to the Expansions: </p>
				<form method = "post" action = "addExpansion.php">
					<fieldset>
						<p> Expansion Title : <input type = "text" name = "expTitle" required></p>
						<p> Villain: <input type = "text" name = "expVillain" required></p>
						<p> Date Released (yyyy-mm-dd): <input type = "text" name = "expDate" required></p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
			<p> Add to the Leaders: </p>
				<form method = "post" action = "addLeader.php">
					<fieldset>
						<p> Leader First Name : <input type = "text" name = "leadFirst" required></p>
						<p> Leader Last Name: <input type = "text" name = "leadLast" required></p>
						<p> Class: <input type = "text" name = "leadClass" required></p>
						<p> Race:
						<select name="leadRace">
							<?php
							//this should display a drop-down of all races names to choose one for the leader.
							if(!($stmt = $mysqli->prepare("SELECT id, name FROM race"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						  }

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($id, $rname)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $rname . '</option>\n';
							}
							$stmt->close();
							?>
						</select> </p>
						<p><input type="submit" /></p>
					</fieldset>
				</form>
				<p> Add to the Races: </p>
					<form method = "post" action = "addRaces.php">
						<fieldset>
							<p> Race Name : <input type = "text" name = "raceName" required></p>
							<p> Allegiance: <input type = "text" name = "raceAlly" required></p>
							<p> Passive: <input type = "text" name = "racePass" required></p>
							<p> Expansion:
							<select name="raceExpand">
								<?php
								//this should display a drop-down of all expansion titles to choose one for the race addition.
								if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							  }

								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								if(!$stmt->bind_result($id, $title)){
									echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								while($stmt->fetch()){
									echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
								}
								$stmt->close();
								?>
							</select> </p>
							<p> Capital:
							<select name="raceCapital">
								<?php
								//this should display a drop-down of all city names to choose one for the race addition.
								if(!($stmt = $mysqli->prepare("SELECT id, name FROM capital"))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							  }

								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								if(!$stmt->bind_result($id, $name)){
									echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								while($stmt->fetch()){
									echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
								}
								$stmt->close();
								?>
							</select> </p>
							<p><input type="submit" /></p>
						</fieldset>
					</form>
				<p> Add a Leader to an Expansion: </p>
					<form method = "post" action = "addLeaderExpansion.php">
						<fieldset>
							<p> Leader:
							<select name="leaderName">
								<?php
								//this should display a drop-down of all leader names to add one to the lead_expansion table.
								if(!($stmt = $mysqli->prepare("SELECT id, fname, lname FROM leaders"))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							  }

								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								if(!$stmt->bind_result($id, $fname, $lname)){
									echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								while($stmt->fetch()){
									echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname . '</option>\n';
								}
								$stmt->close();
								?>
							</select> </p>
							<p> Expansion:
							<select name="expansionName">
								<?php
								//this should display a drop-down of all expansion titles to add one to the lead_expansion table.
								if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
									echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							  }

								if(!$stmt->execute()){
									echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								if(!$stmt->bind_result($id, $title)){
									echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
								}
								while($stmt->fetch()){
									echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
								}
								$stmt->close();
								?>
							</select> </p>
							<p><input type="submit" /></p>
						</fieldset>
					</form>
		</div>
		<h2> Remove Data From Tables: </h2>
		<div>
			<p> Remove a Race from the Database </p>
			<form method = "post" action = "removeRace.php">
				<fieldset>
					<p> Race:
					<select name="deleteRace">
						<?php
						//this should display a drop-down of all race names.
						if(!($stmt = $mysqli->prepare("SELECT id, name FROM race"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $name)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p><input type="submit" /></p>
				</fieldset>
			</form>
			<p> Remove a Capital City from the Database </p>
			<form method = "post" action = "removeCapital.php">
				<fieldset>
					<p> Capital Name:
					<select name="deleteCapital">
						<?php
						//this should display a drop-down of all capital names.
						if(!($stmt = $mysqli->prepare("SELECT id, name FROM capital"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $name)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p><input type="submit" /></p>
				</fieldset>
			</form>
			<p> Remove a Leader from the Database </p>
			<form method = "post" action = "removeLeader.php">
				<fieldset>
					<p> Leader:
					<select name="deleteLeader">
						<?php
						//this should display a drop-down of all leader first and last names.
						if(!($stmt = $mysqli->prepare("SELECT id, fname, lname FROM leaders"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $fname, $lname)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p><input type="submit" /></p>
				</fieldset>
			</form>
			<p> Remove an Expansion from the Database </p>
			<form method = "post" action = "removeExpansion.php">
				<fieldset>
					<p> Title:
					<select name="deleteExpansion">
						<?php
						//this should display a drop-down of all expansion titles.
						if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $title)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p><input type="submit" /></p>
				</fieldset>
			</form>
			<p> Remove a joined Leader/Expansion pair from Database (this will only remove the pairing, not the leader or expansion themselves.)</p>
			<form method = "post" action = "removeLeadExp.php">
				<fieldset>
					<p> Leader:
					<select name="deleteLeadExp">
						<?php
						//this should display a drop-down of all leader first and last names.
						if(!($stmt = $mysqli->prepare("SELECT id, fname, lname FROM leaders"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $fname, $lname)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p> Expansion:
					<select name="deleteExpLead">
						<?php
						//this should display a drop-down of all expansion titles.
						if(!($stmt = $mysqli->prepare("SELECT id, title FROM expansion"))){
							echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
						}

						if(!$stmt->execute()){
							echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						if(!$stmt->bind_result($id, $title)){
							echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value=" '. $id . ' "> ' . $title . '</option>\n';
						}
						$stmt->close();
						?>
					</select> </p>
					<p><input type="submit" /></p>
				</fieldset>
			</form>
		</div>
	</body>
</html>
