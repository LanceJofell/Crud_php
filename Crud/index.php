<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div style="text-align:center;">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  <label for="fname">ID:</label><br>
	  <input type="text" id="fname" name="studid" value=""><br>
	  <label for="lname">NAME:</label><br>
	  <input type="text" id="lname" name="studname" value=""><br><br>
	   <label for="lname">COURSE:</label><br>
	  <input type="text" id="lname" name="course" value=""><br><br>
	   <label for="lname">YEAR:</label><br>
	  <input type="text" id="lname" name="year" value=""><br><br>
	  <input type="submit" value="Submit">
	  <button><a href="list.php"> student list </a> </button>
	</form>



	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "irisdb";



	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$studid= $_POST['studid'];
		$studname= $_POST['studname'];
		$course= $_POST['course'];
		$year= $_POST['year'];
	

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO iris (studid, studname, course,year)
		VALUES ('" .$studid."','".$studname."','". $course."','". $year."')";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		   header("location: list.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	?>

</div>
	
</body>

</html>

