<html>
  <head>
    <title>Untitled</title>
  </head>
  <body>
	
	  <?php
	  // Database connection parameters
	  $hostname = "localhost:3306";
	  $username = "Manager";
	  $password = "GoDrive123";
	  $dbname = "GoDrive123";
	  
	  // Establishing connection to the database
	  $con = mysqli_connect("localhost:3306","Manager","GoDrive123", "GoDrive");
	  
	  // Checking if connection is successful
	  if(!$con){
		  // If connection fails, terminate script execution and display error message
		  die("Failed to connect to MySQL: " . mysqli_connect_error());
	  } 
	  ?>
  </body>
</html>
