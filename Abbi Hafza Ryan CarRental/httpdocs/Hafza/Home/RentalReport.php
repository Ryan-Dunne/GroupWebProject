<html>
 <head>
    <title>Rental Report</title>
	 <link rel="stylesheet" type="text/css" href="CarType.css">
</head>
<body id="repBody">
<?php include 'db.inc.php'; 
date_default_timezone_set('UTC');
?>
<form action="RentalReport.php" method="post" name="reportForm">
	<input type="hidden" name="choice"/>
</form>
	
<h1>Rental Report </h1>
<h3> (click a button to see the Rental Report in the desired order) <h3>
	
<!-- Buttons for mixing up the order the report is sorted in -->
<input type="button" id="rentButton" class="repButtons" value="Company ID Order" onclick="dateOrder()" title="Click here to see Rental Report in the reverse order of Birth Date Order">

<input type="button" id="cidButton" class="repButtons" value="Rental Date Order" onclick="cidOrder()" title="Click here to see Rental Report in the reverse order of engine size order">
<br><br>

<script>
//functions for changing the order
function dateOrder(){
	document.reportForm.choice.value = "rentalDate";
	document.reportForm.submit();
}
	
function cidOrder(){
	document.reportForm.choice.value = "companyID";
	document.reportForm.submit();
}	
</script>

<?php 

$choice = "companyID";	//by default it is version
if(ISSET($_POST['choice']))
{
	$choice = $_POST['choice'];	
}
	
if($choice == "rentalDate")
{
?>
<script>
document.getElementById("rentButton").disabled = true; //rent date is currently the order 
document.getElementById("cidButton").disabled = false;
</script>

<?php 
$sql = "SELECT * from rental ORDER BY CompanyID DESC";
produceReport($con, $sql);
}

else // if $choice == companyID 
{
?>
<script>
document.getElementById("rentButton").disabled = false; 
document.getElementById("cidButton").disabled = true; //company ID is currently the order 
</script>
<?php
$sql = "SELECT * from rental ORDER BY rentalDate DESC";
produceReport($con, $sql);

};
	
function produceReport($con, $sql)
{
	$result = mysqli_query($con, $sql);
	
	echo "<table id='repTable'>
			<tr id='titleRow'><th>CompanyID</th><th>rentalDate</th><th>rentalID</th><th>carID</th><th>companyName</th><th>companyAddress</th><th>carReg</th><th>carName</th><th>dueReturnDate</th><th>actualReturnDate</th><th>cost</th></tr>";
	
	while ($row = mysqli_fetch_array($result))
	{
		$date = date_create($row['rentalDate']);
		$FDate = date_format($date, "d/m/Y");
		
		echo "<tr id='bodyRow'><td>" .$row['CompanyID'] ."</td>
			<td>" .$row['rentalDate'] ."</td>
			<td>" .$row['rentalID'] ."</td>
			<td>" .$row['carID'] ."</td>
			<td>" .$row['companyName'] ."</td>
			<td>" .$row['companyAddress'] ."</td>
			<td>" .$row['carReg'] ."</td>
			<td>" .$row['carName'] ."</td>
			<td>" .$row['dueReturnDate'] ."</td>
			<td>" .$row['actualReturnDate'] ."</td>
			<td>" .$row['cost'] ."</td></tr>";
	}
	
	echo "</table>";
	
}
	
mysqli_close($con)
	
?>

</body>
</html>
