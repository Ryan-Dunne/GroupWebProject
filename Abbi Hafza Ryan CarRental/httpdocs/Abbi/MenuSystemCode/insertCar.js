/* insertCar.js
javascript file used for adding a new car
student name: abigail murray
student number: C00260073
 */

// Function for confirm insert, if the user confirms they want to add details to the database
//returns true if the user clicks "OK" and false if the user clicks "Cancel".
/*function confirmInsert() {
    var registration = document.getElementById('registration').value;
    var chassis = document.getElementById('chassis').value;
    var doors = document.getElementById('doors').value;
    var price = document.getElementById('price').value;
    var colour = document.getElementById('colour').value;
    var bodyStyle = document.getElementById('bodyStyle').value;
    var carType = document.getElementById('carType').value;
    var dateAdded = document.getElementById('dateAdded').value;
  
    // Confirm the submission
    
    return confirm('Are you sure you want to insert the record?');
	
}*/


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
    
    if (confirmed) {
        // Show pop-up message indicating that a new car was added
        var message = "A new car has been added to the database";
        alert(message);
    }
    
    return confirmed; // Return true if confirmed, false otherwise
}

function setCurrentDate() {
    var currentDate = new Date().toISOString().split('T')[0];
    document.getElementById('dateAdded').value = currentDate;
}


// Call setCurrentDate() when the page loads
window.onload = function() {
    setCurrentDate();
};

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




/*

// Function to check that the date entered is not in the future
function validateDate() {
    var enteredDate = new Date(document.getElementById("dateAdded").value);
    var today = new Date();
    
    // Set time of entered date to 00:00:00 to compare dates without time
    enteredDate.setHours(0, 0, 0, 0);
    today.setHours(0, 0, 0, 0);
    
    if (enteredDate > today) {
        alert("Date cannot be in the future.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission

// Function to set the current date in the "Date Added" input field -- default to system date 
function setCurrentDate() {
    var currentDate = new Date().toISOString().split('T')[0];//toISOString() method used to convert date to a string in the format 	   //"YYYY-MM-DDTHH:mm:ss.sssZ",split('T')[0]  used to extract only the date portion (before the 'T' character)= YYYY-MM-DD
	
    document.getElementById('dateAdded').value = currentDate;  // Set the value of the "Date Added" input field
}



// Call the function to set the current date when the form loads
window.onload = setCurrentDate;// assigns the setCurrentDate function to the window's onload event.

*/