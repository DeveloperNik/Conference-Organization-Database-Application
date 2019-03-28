<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Sponsors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="home.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" />
    <title>CMPE 332 Project: Group 95</title>
</head>

<body>
    <div class="head1"></div>

    <section>
        <div class="sidenav">
            <a href="home.html">Home</a>
            <a href="schedule.php">Schedule</a>
            <a href="committees.php">Committees</a>
            <a href="sponsors.php" class="active">Sponsors</a>
            <a href="attendees.php">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
			
        </div>
        <div class="content">
            <h1>Sponsors</h1>
			<div>
			<?php

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql1 = "select name from company where donation >= 10000";
			$stmt1 = $pdo->query($sql1);
			echo "<table style='border: solid 1px black; width: 300px; text-align: center;'><tr><td><h3>Platimum Sponsors</h3></tr></td>";
			while ($row = $stmt1->fetch()) {
				echo "<tr><td style='width: 300px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}

			?>
			</table>
			<?php

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql2 = "select name from company where donation >= 5000 and donation < 10000";
			$stmt2 = $pdo->query($sql2);
			echo "<table style='border: solid 1px black; width: 300px; text-align: center;'><tr><td><h3>Gold Sponsors</h3></td></tr>";
			while ($row = $stmt2->fetch()) {
				echo "<tr><td style='width: 300px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}

			?>
			</table>
			<?php

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql3 = "select name from company where donation >= 3000 and donation < 5000";
			$stmt3 = $pdo->query($sql3);
			echo "<table style='border: solid 1px black; width: 300px; text-align: center;'><tr><td><h3>Silver Sponsors</h3></td></tr>";
			while ($row = $stmt3->fetch()) {
				echo "<tr><td style='width: 300px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}

			?>
			</table>
			<?php

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql4 = "select name from company where donation > 1000 and donation < 3000";
			$stmt4 = $pdo->query($sql4);
			echo "<table style='border: solid 1px black; width: 300px; text-align: center;'><tr><td><h3>Bronze Sponsors</h3></td></tr>";
			while ($row = $stmt4->fetch()) {
				echo "<tr><td style='width: 300px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}

			?>
			</table>
			<?php

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql5 = "select name from company where donation < 1000";
			$stmt5 = $pdo->query($sql5);
			echo "<table style='border: solid 1px black; width: 300px; text-align: center;'><tr><td><h3>Other Sponsors</h3></td></tr>";
			while ($row = $stmt5->fetch()) {
				echo "<tr><td style='width: 300px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}
			?>
			</table>
		</div>
			
			<h3>Add a new sponsoring company</h3>
			<form action="addSponsor.php" method="post">
				<p>Company name:</p>
				<input type="text" name="companyName">
				<br>
				<p>Donation:</p>
				<input type="number" name="donation">
				<br>
				<input type="submit">
			</form>

			<h3>Delete a sponsoring company</h3>
			<form action="deleteSponsor.php" method="post">
				<p>Company name:</p>
				<input type="text" name="companyName">
				<br>
				<input type="submit">
			</form>
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>