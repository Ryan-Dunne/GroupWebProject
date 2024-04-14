<!-- deleting a car, checking the rental table first to see if a car is out on rental based on return date, if return date is null it has not been returned and is still out-->

<?php 
session_start();
?> 

<br><br>

<?php 
include 'db.inc.php';

// Get the car ID to be deleted
$carID = $_POST['delid'];

// Check if the car is out on rental by looking for active rentals (actualReturnDate is NULL)
$queryRental = "SELECT * 
                FROM rental
                INNER JOIN `rental/car` ON rental.rentalID = `rental/car`.rentalID
                WHERE `rental/car`.carID = '$carID' AND rental.actualReturnDate IS NULL"; 
$resultRental = mysqli_query($con, $queryRental);

// If there are any active rentals for this car, prevent deletion
if(mysqli_num_rows($resultRental) > 0) {
    echo '<script>alert("You cannot delete this car as it is currently out on rental.");</script>';
} else {
    // If the car is not out on rental, proceed with deletion
    $sql = "UPDATE car SET deletedFlag = true WHERE carID = '$carID'";

    if(!mysqli_query($con, $sql)) {
        echo "Error: " . mysqli_error($con);
    } else {
        // Set session variables for deleted car
        $_SESSION["carID"] = $_POST['delid'];
        $_SESSION["registration"] = $_POST['delregistration'];
        $_SESSION["colour"] = $_POST['delcolour'];
        $_SESSION["bodyStyle"] = $_POST['delbodyStyle'];
        $_SESSION["dateAdded"] = $_POST['deldateAdded']; 
        $_SESSION["currentStatus"] = $_POST['delcurrentStatus'];
        $_SESSION["colour"] = $_POST['delcolour'];
        
        mysqli_close($con);
        
        // Redirect to the page after deletion
        echo '<script>window.location = "DeleteCar.html.php";</script>';
    }
}
?>
