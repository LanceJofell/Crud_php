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
	$var_id =  $_GET["studid"];
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// sql to delete a record
		$sql = "DELETE FROM iris WHERE studid='" .$var_id. "'";

		if ($conn->query($sql) === TRUE) {
		   header("location: list.php");
		} else {
		  echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
		?>
</body>

</html>

