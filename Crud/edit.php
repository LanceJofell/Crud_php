<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


	
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "irisdb";



	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

		
	//display records
	// Check connection
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$var_id =  $_GET["studid"];
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

			$sql = "SELECT studid, studname, course,year FROM irisdb WHERE studid='" .$var_id. "'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			// output data of each row
			  while($row = $result->fetch_assoc()) {


				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			  echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
			  echo "<label for='studid'>ID:</label><br>";
			  echo "<input type='text' id='txtstudid' name='studid' value='".$row["studid"] ."'><br>";
			  echo "<label for='lname'>NAME:</label><br>";
			  echo "<input type='text' id='lname' name='studname' value='".$row["studname"] ."'><br><br>";
			  echo "<label for='lname'>COURSE:</label><br>";
			  echo "<input type='text' id='lname' name='course' value='".$row["course"] ."'><br><br>";
			  echo "<label for='lname'>YEAR:</label><br>";
			  echo "<input type='text' id='lname' name='year' value='".$row["year"] ."'><br><br>";
			  echo "<input type='submit' value='update'>";
			  echo "</form>";
		  
			  }
			} else {
			  echo "0 results";
			}
		}
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$studid= $_POST['studid'];
				$studname= $_POST['studname'];
				$course= $_POST['course'];
				$year= $_POST['year'];
		
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}

				$sql = "UPDATE studentinfo

					SET studname='" .$studname."', course='" .$course."',year='" .$year."'
					WHERE studid='".$studid."'"; 
			

				if ($conn->query($sql) === TRUE) {
				  echo " Record successfully updated";
				  header("location: list.php");
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	
	$conn->close();
	?>
</body>

</html>

