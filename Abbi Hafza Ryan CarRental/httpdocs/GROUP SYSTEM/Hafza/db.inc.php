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
	  $dbname = "GoDrive";
	  
	  // Establishing connection to the database
	  $con = mysqli_connect($hostname,$username,$password, $dbname);
	  
	  // Checking if connection is successful
	  if(!$con){
		  // If connection fails, terminate script execution and display error message
		  die("Failed to connect to MySQL: " . mysqli_connect_error());
	  } 
	  ?>
  </body>
</html>
