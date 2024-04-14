
/*	name of: insertCar.js
	purpose: the purpose of this file is to add a new car, check user wants to submit and validate dates 
	Student name: Abigail Murray
	Student Number:C00260073 
	Date: feb 2024*/


//function for confirming the user would like to submit and add to database 
function confirmInsert() {
    var registration = document.getElementById('registration').value;
    var chassis = document.getElementById('chassis').value;
    var doors = document.getElementById('doors').value;
    var price = document.getElementById('price').value;
    var colour = document.getElementById('colour').value;
    var bodyStyle = document.getElementById('bodyStyle').value;
    var carType = document.getElementById('carType').value;
    var dateAdded = document.getElementById('dateAdded').value;
  
    // Confirm the submission
    var confirmed = confirm('Are you sure you want to insert the record?');
    
    if (confirmed)
	{
    // Show pop-up message indicating that a new car was added
       var message = "A new car has been added to the database";
       alert(message);
    }
    
    return confirmed; // Return true if confirmed, false otherwise
}

//function to set the default date added to the current date
function setCurrentDate() {
    var currentDate = new Date().toISOString().split('T')[0];
    document.getElementById('dateAdded').value = currentDate;
}


// Call setCurrentDate() when the page loads
window.onload = function() {
    setCurrentDate();
};

//function to validate the date- must not be in the future
function validateDate() {
    var enteredDate = new Date(document.getElementById("dateAdded").value);
    var currentDate = new Date(); // Get current date
    
    // Remove time from dates for accurate comparison
    enteredDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    
    if (enteredDate > currentDate) {
        alert("Date cannot be in the future.");
        document.getElementById("dateAdded").value = ""; // Clear the input field
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}



