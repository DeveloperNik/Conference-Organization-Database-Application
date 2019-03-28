<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Finances</title>
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
            <a href="sponsors.php">Sponsors</a>
            <a href="attendees.php">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php" class="active">Finances</a>
        </div>
        <div class="content">
            <h1>Finances</h1>
		<?php
			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql1 = "select sum(donation) from company";
			$stmt1 = $pdo->query($sql1);
			$sponsor = $stmt1->fetch()[0];
			
			$sql2 = "select count(*) from student";
			$stmt2 = $pdo->query($sql2);
			$student = 50*$stmt2->fetch()[0];
			
			$sql3 = "select count(*) from professional";
			$stmt3 = $pdo->query($sql3);
			$pro = 100*$stmt3->fetch()[0];
			
			$subtotal = $pro + $student;
			$total = $sponsor + $student + $pro;
			echo "<table style='border: solid 1px black;'><tr><th>Type</th><th>Amount</th></tr>";
			echo "<tr><td style='width: 150px; border: 1px solid black;'>Admission</td><td style='width: 150px; border: 1px solid black;'>$subtotal</td></tr>"; 
			echo "<tr><td style='width: 150px; border: 1px solid black;'>Sponsorship</td><td style='width: 150px; border: 1px solid black;'>$sponsor</td></tr>";
			echo "<tr><td style='width: 150px; border: 1px solid black;'>Total</td><td style='width: 150px; border: 1px solid black;'>$total</td></tr>";
			
			?>
			</table>
			</div>
    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>