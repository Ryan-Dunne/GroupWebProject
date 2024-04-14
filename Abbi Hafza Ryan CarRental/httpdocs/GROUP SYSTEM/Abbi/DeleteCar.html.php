<!--
•	Name of screen: DeleteCar.html.php 
•	Purpose of screen: This is the form which allows a user to delete a car from the database 
	Checks that the car is not out on rental before its deleted from the database.
	Doesn't fully delete the car from the database but sets deleted flag to 1
• 	connected to myStyle.css
•	|Student name:Abigail Murray|Student Number:C00260073|Date: march 2024|
-->

<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="myStyle.css">
    <title>Delete Car</title>
</head>

<body>
    <!--HEADER-->
    <div class="header">
        <h1>Car Menu: Delete</h1>
        <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>

    <?php include 'menu.php'?> <!--including navbar -->

    <div class="column">
        <div class="deleteCar">

            <h2>Please Select by Registration</h2>
            <div class="form-group">
                <?php include 'deletecarlistbox.php'; ?> <!--generates a listbox of car registrations -->
            </div>
            <script>
                /*function to populate when user clicks on car from listbox */
                function populate() {
                    var sel = document.getElementById("deletecarlistbox");
                    var result;
                    result = sel.options[sel.selectedIndex].value;
                    var carDetails = result.split(',');
                    document.getElementById("delid").value = carDetails[0];
                    document.getElementById("delregistration").value = carDetails[1];
                    document.getElementById("delcolour").value = carDetails[2];
                    document.getElementById("delbodyStyle").value = carDetails[3];
                    document.getElementById("deldoors").value = carDetails[4];
                    document.getElementById("deldateAdded").value = carDetails[5];
                    document.getElementById("delcurrentstatus").value = carDetails[6];
                    // Extract and populate car type separately- works better this way
                    var carTypeID = carDetails[7];
                    document.getElementById("delcarType").value = carTypeID;

                }
                /*confirm that they want to delete the car*/
                function confirmCheck() {
                    var response;
                    response = confirm('Are you sure you want to delete this Car?');
                    if (response) {
                        document.getElementById("delid").disabled = false;
                        document.getElementById("delregistration").disabled = false;
                        document.getElementById("delcolour").disabled = false;
                        document.getElementById("delbodyStyle").disabled = false;
                        document.getElementById("deldoors").disabled = false;
                        document.getElementById("deldateAdded").disabled = false;
                        document.getElementById("delcurrentstatus").disabled = false;
                        document.getElementById("delcarType").disabled = false;
                        return true;
                    }
                    else {
                        populate();
                        return false;
                    }
                }
            </script>
            <!-- delete form displayed-->
            <p id="display"></p>
            <form name="deleteForm" action="DeleteCar.php" onsubmit="return confirmCheck()" method="post">

                <div class="form-group">
                    <label for="delid">Car ID</label>
                    <input type="text" name="delid" id="delid" disabled>
                </div>

                <div class="form-group">
                    <label for="delregistration">Registration Number</label>
                    <input type="text" name="delregistration" id="delregistration" disabled>
                </div>

                <div class="form-group">
                    <label for="delcolour">Colour</label>
                    <input type="text" name="delcolour" id="delcolour" disabled>
                </div>

                <div class="form-group">
                    <label for="delbodyStyle">Body Style</label>
                    <input type="text" name="delbodyStyle" id="delbodyStyle" disabled>
                </div>

                <div class="form-group">
                    <label for="deldoors">Number of Doors</label>
                    <input type="text" name="deldoors" id="deldoors" disabled>
                </div>

                <div class="form-group">
                    <label for="deldateAdded">Date Added to Fleet</label>
                    <input type="text" name="deldateAdded" id="deldateAdded" disabled>
                </div>

                <div class="form-group">
                    <label for="delcurrentstatus">Current Status</label>
                    <input type="text" name="delcurrentstatus" id="delcurrentstatus" disabled>
                </div>

                <div class="form-group">
                    <label for="delcarType">Car Type</label>
                    <select name="delcarType" id="delcarType" disabled>
                        <?php include 'carTypeListbox.php';?>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" value="Delete the record">Delete Record</button>
                    <button
                        type="reset">Reset</button><!-- adding in reset option if user would like to reset the fields-->
                </div>

            </form>
        </div><!--close deleteCar-->
    </div><!--close column-->
</body>

</html>
