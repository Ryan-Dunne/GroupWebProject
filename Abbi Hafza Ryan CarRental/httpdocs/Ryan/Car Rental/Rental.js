/*  Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Allow User to make Rentals
*/
function helpMenu()
{
    alert ("Steps to make a Rental: \n 1.Select your company \n 2.Select your desired car from the list \n 3.Select a day to return the car \n 4.click 'Book Rental' ")
}

function confirmSubmit()    //function called when form is about to be submit
{

        if(confirm("Are you sure you want to submit this form?") == false) //Asks User for Confirmation
        {
            return false;
        }
        else
        {
            submitFields();
            return true;
            
        }
   
}


function populate()  //Populates Text fields
{
  
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by double spaces into different indexes in companyDetails
    document.getElementById("companyID").value = companyDetails[0];
    document.getElementById("companyName").value = companyDetails[1]; //populates fields with values at companyDetails index
    document.getElementById("address").value = companyDetails[2];
    document.getElementById("amountOwed").value = companyDetails[3];
    document.getElementById("credit").value = companyDetails[4];


}


function submitFields()  //Submits Text fields
{
    document.getElementById("companyName").disabled = false;
    document.getElementById("address").disabled = false;
    document.getElementById("credit").disabled = false;     //Ensures fields can be posted
    document.getElementById("amountOwed").disabled = false;
    document.getElementById("carReg").disabled = false;
    document.getElementById("currentDate").disabled = false;

}


function getSetTableData(x) //Takes current instance of activated function as a parameter
{
    var currentDate = new Date().toISOString().split("T")[0]; //Uses ISO 8601 standard format, splits String at T with 0 subStrings (Stack Overflow )


    var carID = document.getElementById("carTable").rows[x.rowIndex].cells[0].innerHTML;
    var carReg = document.getElementById("carTable").rows[x.rowIndex].cells[1].innerHTML;
    var carName = document.getElementById("carTable").rows[x.rowIndex].cells[2].innerHTML;  //Populates variables with data from Cells according to instance index
    var costPerDay = document.getElementById("carTable").rows[x.rowIndex].cells[9].innerHTML;
    var fiveDayDiscount = document.getElementById("carTable").rows[x.rowIndex].cells[10].innerHTML;
    var tenDayDiscount = document.getElementById("carTable").rows[x.rowIndex].cells[11].innerHTML;
    document.getElementById("carID").value = carID;
    document.getElementById("carReg").value = carReg;
    document.getElementById("carName").value = carName;
    document.getElementById("costPerDay").value = costPerDay;               //Populates form data with variables
    document.getElementById("fiveDayDiscount").value = fiveDayDiscount;
    document.getElementById("tenDayDiscount").value = tenDayDiscount;
    document.getElementById("currentDate").value = currentDate;
}


function calculateCost()    //Stack Overflow
{
    var formCurrentDate = document.getElementById("currentDate").value;
    var formReturnDate = document.getElementById("returnDate").value;
    const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
    const currentDate = new Date(formCurrentDate);
    const returnDate = new Date(formReturnDate);
    currentDate.setHours(0,0,0,0);
    returnDate.setHours(0,0,0,0);
    
    var creditLimit = document.getElementById("credit").value;
    var noOfDays = Math.round((returnDate - currentDate) / oneDay);
  
    var costPerDay = document.getElementById("costPerDay").value;
    var fiveDayDiscount = document.getElementById("fiveDayDiscount").value;
    var tenDayDiscount = document.getElementById("tenDayDiscount").value;
    var totalCost = 0;

    if(noOfDays == 0) //If Return Date is the same as Current Date = Rented for the Day
    {
        noOfDays = 1;
    }
    if(noOfDays < 0) //User Picks a date before present date(Invalid)
    {
        document.getElementById("chooseCar").disabled = true;
        alert("Please Pick A valid Date");
    }
    else
    {
        document.getElementById("chooseCar").disabled = false;
    }

    while(noOfDays > 0) 
    {
        if(noOfDays >= 10) //If User has rented for more than 10 Days
        {
            noOfDays--; //Account for that day
            totalCost = (parseInt(totalCost) + parseInt(costPerDay)) - parseInt(tenDayDiscount); //Charge them  the Rental Category price & apply 10 day discount
        }

        if(noOfDays >= 5 && noOfDays < 10)//If User has rented for more than 5 Days & less than 10
        {
        noOfDays--; //Account for that day
        totalCost = (parseInt(totalCost) + parseInt(costPerDay)) - parseInt(fiveDayDiscount); //Charge them  the Rental Category price & apply 5 day discount
        }
        if(noOfDays > 0 && noOfDays < 5)
        {
            noOfDays--; //Account for that day
            totalCost = parseInt(totalCost) + parseInt(costPerDay);  //Charge them  the standard Rental Category price
        }
    }

    document.getElementById("totalCost").value = totalCost; //When all days are accounted for, displays cost

    if(totalCost > creditLimit) //if Cost is over Users Balance
    {
        document.getElementById("chooseCar").disabled = true; //Disables submit button
        alert("Insufficient Funds to Cover Rental Cost!")   //Displays Error
    }
 


}


