<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.inc.php';

$sql = "UPDATE carType SET DeleteFlag=1 WHERE carTypeID = '{$_POST['carTypeID']}' ";

if(!mysqli_query($con, $sql))
{
	echo "ERROR " . mysqli_error($con);
}
//set session vars

$_SESSION['carTypeID'] = $_POST['carTypeID'];
$_SESSION['modelName'] = $_POST['modelName'];
$_SESSION['version'] = $_POST['version'];

mysqli_close($con);
?>

<script>
window.location = "DeleteCarType.html.php"
</script>