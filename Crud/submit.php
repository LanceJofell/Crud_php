<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<button><a href="index.php"> Add New </a> </button>
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
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	//display records
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

		$sql = "SELECT studid, studname, course,year FROM iris";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "  <table class='table'>";
			 echo "<thead>";
		      echo "<tr>";
		      echo  "<th>ID</th>";
		      echo  "<th>NAME</th>";
			    echo  "<th>COURSE</th>";
				  echo  "<th>YEAR</th>";
				   echo  "<th></th>";
		      echo  "</tr>";
		    echo "</thead>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	echo "<tr>";	
		    echo  "<td>" .$row["studid"] . "</td><td>" . $row["studname"]. "</td><td> " . $row["course"]. "</td><td>" . $row["year"]. "</td>"
			. "<td><button><a href='edit.php?studid=". $row["studid"] ."&studname=".$row["studname"] ."'>Edit</a> </button>
			<button><a href='delete.php?studid=". $row["studid"]."'>Delete</a> </button></td>";
			
		    echo "</tr>";
		  }
		  echo "</table>";
		} else 
		{
		  echo "0 results";
		}
	
	
	
	$conn->close();
	?>

</body>

</html>

