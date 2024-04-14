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

// Function to set the current date in the "Date Added" input field -- default to system date 
function setCurrentDate() {
    var currentDate = new Date().toISOString().split('T')[0];//toISOString() method used to convert date to a string in the format 	   //"YYYY-MM-DDTHH:mm:ss.sssZ",split('T')[0]  used to extract only the date portion (before the 'T' character)= YYYY-MM-DD
	
    document.getElementById('dateAdded').value = currentDate;  // Set the value of the "Date Added" input field
}

// Call the function to set the current date when the form loads
window.onload = setCurrentDate;// assigns the setCurrentDate function to the window's onload event.

