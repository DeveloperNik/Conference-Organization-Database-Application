<!DOCTYPE html>
<html>
<head>
    <title>CompRecCon - Hotel</title>
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
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
			<?php
			$name = $_POST["companyName"];
			$don = $_POST["donation"];
			if ($name != null && $don != null && $don >= 0 ){
				$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
				$sql1 = "select name from company where name = '$name'";
				$stmt1 = $pdo->query($sql1);
				$isThere = $stmt1->fetch();
				if ($isThere == null){
					#connect to the database
					
					$sql = "insert into Company values ('$name', '$don', '0')";
					$stmt = $pdo->query($sql);   #create the query

					echo "Sponsor company $name added!";
				} else{
					echo "Company $name already in database, cannot add.";	
				}
			} else {
				echo "Invalid form, please revise your inputs.";
			}
			?>
			<br>
			<a href="sponsors.php">Return to Sponsors Page</a>
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>
</html> 