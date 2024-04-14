<!--
•	Name of screen: AmendCar.html.php
•	Purpose of screen: This file is used to get the user to click which car they want to amend/view details for
•	connects to myStyle.css for stylesheet
•	|Student name:Abigail Murray|Student Number:C00260073|Date: February 2024|
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="myStyle.css">
    <title>Amend/View Car</title>
</head>

<body>
    <!--Header-->
    <div class="header">
        <h1>Amend/View a car</h1>
        <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>

    <?php include 'menu.php';?> <!--include the navbar menu for accessing other pages -->

    <div class="column"><!--gradient background behind form-->
        <div class="amendCar"> <!-- class for form elements-->
            <h2>Select by Car Registration</h2>
            <div class="form-group">
                <?php include 'AmendListbox.php';?>
                <!-- include a lsitbox of all cars which are currently in the database-->
            </div>

            <script>
                //function to populate the details of the car table*/
                function populate() {
                    var sel = document.getElementById("AmendListbox");
                    var result = sel.options[sel.selectedIndex].value;
                    var carDetails = result.split(',');

                    // Populate form fields with car details
                    document.getElementById("amendid").value = carDetails[0];
                    document.getElementById("amendregistration").value = carDetails[1];
                    document.getElementById("amendstatus").value = carDetails[2];
                    document.getElementById("amendchassis").value = carDetails[3];
                    document.getElementById("amenddoors").value = carDetails[4];
                    document.getElementById("amendprice").value = carDetails[5];
                    document.getElementById("amenddate").value = carDetails[6];
                    document.getElementById("amendstyle").value = carDetails[7];
                    document.getElementById("amendcolour").value = carDetails[8];

                    // Extract and populate car type separately- working better this way as car type has listbox
                    var carTypeID = carDetails[9];
                    document.getElementById("amendtype").value = carTypeID;
                }

                //function which toggles
				//allows the user to edit the details or locks depending on the current state indicated by the button's value.
                function toggleLock() {
                    // If the button value is "Amend Details", it means the user wants to amend details.
                    // enable the input fields and change the button value to "View Details"
                    if (document.getElementById("amendViewButton").value == "Amend Details") {
                        document.getElementById("amendchassis").disabled = false;
                        document.getElementById("amenddoors").disabled = false;
                        document.getElementById("amendprice").disabled = false;
                        document.getElementById("amenddate").disabled = false;
                        document.getElementById("amendstyle").disabled = false;
                        document.getElementById("amendcolour").disabled = false;
                        document.getElementById("amendtype").disabled = false;

                        document.getElementById("amendViewButton").value = "View Details";
                    }
                    else {
                        // If the button value is not "Amend Details", it means the user wants to view details.
                        //disable the input fields and change the button value to "Amend Details".
                        document.getElementById("amendchassis").disabled = true;
                        document.getElementById("amenddoors").disabled = true;
                        document.getElementById("amendprice").disabled = true;
                        document.getElementById("amenddate").disabled = true;
                        document.getElementById("amendstyle").disabled = true;
                        document.getElementById("amendcolour").disabled = true;
                        document.getElementById("amendtype").disabled = true;

                        document.getElementById("amendViewButton").value = "Amend Details";
                    }
                }

                //confirm check function checks all fields are valid before confimation
                function confirmCheck() {
                    //Check if any option is selected in the listbox
					//If not selected, it prompts the user to select a car before saving changes.
                    var sel = document.getElementById("AmendListbox");
                    if (sel.selectedIndex === -1) {
                        alert("Please select a car before saving changes.");
                        return false;
                    }

                    //Check if any input field has been modified
                    var amendid = document.getElementById("amendid").value;
                    var amendregistration = document.getElementById("amendregistration").value;
                    var amendstatus = document.getElementById("amendstatus").value;
                    var amendchassis = document.getElementById("amendchassis").value;
                    var amenddoors = document.getElementById("amenddoors").value;
                    var amendprice = document.getElementById("amendprice").value;
                    var amenddate = document.getElementById("amenddate").value;
                    var amendstyle = document.getElementById("amendstyle").value;
                    var amendcolour = document.getElementById("amendcolour").value;
                    var amendtype = document.getElementById("amendtype").value;

                    //checking for empty fields
					//if any field is empty, it alerts the user to fill in all fields before saving changes.
                    if (
                        amendid === "" ||
                        amendregistration === "" ||
                        amendstatus === "" ||
                        amendchassis === "" ||
                        amenddoors === "" ||
                        amendprice === "" ||
                        amenddate === "" ||
                        amendstyle === "" ||
                        amendcolour === "" ||
                        amendtype === ""
                    ) {
                        alert("Please fill in all fields before saving changes.");
                        return false;
                    }

                    //Check if any input field has been modified
					//If no changes have been made, it alerts the user that no changes have been made to save.
                    if (
                        amendid === "" &&
                        amendregistration === "" &&
                        amendstatus === "" &&
                        amendchassis === "" &&
                        amenddoors === "" &&
                        amendprice === "" &&
                        amenddate === "" &&
                        amendstyle === "" &&
                        amendcolour === "" &&
                        amendtype === ""
                    ) {
                        alert("No changes have been made to save.");
                        return false;
                    }
						
					//prompt the user to confirm whether they want to save the changes.
                    var response;
                    response = confirm('Are you sure you want to save these changes?');
                    if (response) {
                        // Get the entered date value
                        var enteredDate = new Date(amenddate);
                        var currentDate = new Date(); // Get current date

                        // Remove time from dates for accurate comparison
						/*https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/setHours
						contains helpful information about setHours for date and time comparisons */
                        enteredDate.setHours(0, 0, 0, 0);
                        currentDate.setHours(0, 0, 0, 0);

                        // Check if the entered date is in the future
                        if (enteredDate > currentDate) {
                            alert("Date cannot be in the future.");
                            document.getElementById("amenddate").focus(); // Focus on the input field
                            return false; // Prevent form submission
                        } else {
                            // Enable input fields if date is valid
                            document.getElementById("amendid").disabled = false;
                            document.getElementById("amendregistration").disabled = false;
                            document.getElementById("amendstatus").disabled = false;
                            document.getElementById("amendchassis").disabled = false;
                            document.getElementById("amenddoors").disabled = false;
                            document.getElementById("amendprice").disabled = false;
                            document.getElementById("amenddate").disabled = false;
                            document.getElementById("amendstyle").disabled = false;
                            document.getElementById("amendcolour").disabled = false;
                            document.getElementById("amendtype").disabled = false;
                            return true; // Allow form submission
                        }
                    } else {
                        // If they don't want to amend then populate and keep fields locked
                        populate();
                        toggleLock();
                        return false;
                    }
                }
                //validate to ensure date is not in the future
                function validateDate() {
                    var enteredDate = new Date(document.getElementById("amenddate").value);
                    var currentDate = new Date(); // Get current date

                    // Remove time from dates for accurate comparison
                    enteredDate.setHours(0, 0, 0, 0);
                    currentDate.setHours(0, 0, 0, 0);

                    if (enteredDate > currentDate) {
                        alert("Date cannot be in the future.");
                        document.getElementById("amenddate").value = ""; // Reset the date field
                        document.getElementById("amenddate").focus(); // Focus on the input field
                        return false; // Prevent form submission
                    }
                    return true; // Allow form submission if date is valid
                }

            </script>

            <!-- amend form which is displayed to system user-->
            <p id="display"></p>
            <form name="amendCarForm" action="AmendCar.php" onsubmit="return confirmCheck() && validateDate()"
                method="post">
                <!--the first 3 will not be editable :id, registration and current status-->
                <div class="form-group">
                    <label for="amendid">Car ID</label>
                    <input type="text" name="amendid" id="amendid" class="disabled-input" disabled>
                </div>

                <div class="form-group">
                    <label for="amendregistration">Registration</label>
                    <input type="text" name="amendregistration" id="amendregistration" class="disabled-input" disabled
                        required>
                </div>

                <div class="form-group">
                    <label for="amendstatus">Current Status</label>
                    <input type="text" name="amendstatus" id="amendstatus" class="disabled-input" disabled required>
                </div>
                <!--following are editable-->
                <div class="form-group">
                    <label for="amendchassis">Chassis Number</label>
                    <input type="text" name="amendchassis" id="amendchassis"
                        title="Chassis number must be 17 alphanumeric characters,alpha characters must be upper(excluding Q, I, O)"
                        pattern="[A-HJ-NPR-Z0-9]{17}" disabled required>
                </div><!--Validation:17 characters, alphanumeric, uppercase alpha characters, excluding I,O,Q-->

                <div class="form-group">
                    <label for="amenddoors">Number of Doors</label>
                    <input type="text" name="amenddoors" id="amenddoors"
                        title="Format: You must enter a numeric digit in the range 1-5" pattern="[1-5]" disabled
                        required><!-- Validation: must be in the range 1-5-->
                </div>

                <div class="form-group">
                    <label for="amendprice">Purchase Price</label>
                    <input type="text" name="amendprice" id="amendprice"
                        title="Format: you must only enter numeric digits or fullstop. eg  25980.98  "
                        pattern="^[0-9]+\.?[0-9]{0,2}$" disabled required>
                </div><!--Validation: any number of digits followed by optional . followed bt 0 or 2 digits -->

                <div class="form-group">
                    <label for="amenddate">Date Added to Fleet</label>
                    <input type="date" name="amenddate" id="amenddate"
                        title="format is yyyy-mm-dd.date must be in the past or present date." onblur="validateDate()"
                        disabled required><!--Validation: date must not be in the future,function to validate this-->
                </div>

                <div class="form-group">
                    <label for="amendstyle">Body Style</label>
                    <select name="amendstyle" id="amendstyle" disabled required>
                        <!-- Add an empty option as a placeholder -->
                        <option value="" disabled selected>Select Body Style</option>
                        <option value="saloon">Saloon</option>
                        <option value="pickup">Pickup</option>
                        <option value="suv">Suv</option>
                        <option value="hatchback">Hatchback</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="amendcolour">Colour</label>
                    <select name="amendcolour" id="amendcolour" disabled required>
                        <!-- Add an empty option as a placeholder -->
                        <option value="" disabled selected>Select a Colour</option>
                        <option value="silver">Silver</option>
                        <option value="black">Black</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="grey">Grey</option>
                        <option value="white">White</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="blueMetallic">Blue Metallic</option>
                        <option value="midnightBlue">Midnight Blue</option>
                        <option value="pearlWhite">Pearl White</option>
                        <option value="crimsonRed">Crimson Red</option>
                        <option value="graphiteGrey">Graphite Grey</option>
                        <option value="deepBlack">Deep Black</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="amendtype">Car Type</label>
                    <select name="amendtype" id="amendtype" disabled>
                        <option value="" disabled selected>Select Car Type</option>
                        <?php include 'carTypeListbox.php';?>
                    </select>
                </div>
                <br><br>
                <br><br>
                <div class="button-group-amend">
                    <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
                    <input id="saveChanges" type="submit" value="Save Changes">
                </div>
            </form>
        </div><!--close amendCar-->
    </div><!--close column-->

</html>