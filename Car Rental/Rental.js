function helpMenu()
{
    alert ("A Company's Web Address is not required\n New Companies should start at 1000 credit limit")
}

function confirmSubmit()    //function called when form is about to be submit
{

        if(confirm("Are you sure you want to submit this form?") == false)
        {
            return false;
        }
        else
        {
            return true;
            
        }
   
}


function populate()  //Populates Text fields
{
  
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by , into different indexes in companyDetails
    //document.getElementById("display").innerHTML = "Selected Company: " + companyDetails[1] + "<br>Address: " + companyDetails[2] + "<br>Credit Limit: " + companyDetails[4];
    document.getElementById("companyID").value = companyDetails[0];
    document.getElementById("companyName").value = companyDetails[1]; //populates fields with values at companyDetails index
    document.getElementById("address").value = companyDetails[2];
    document.getElementById("amountOwed").value = companyDetails[3];
    document.getElementById("credit").value = companyDetails[4];


}

function populateCarlistbox()  //Populates Text fields
{
    var currentDate = new Date().toISOString().split("T")[0];

    var sel = document.getElementById("carlistbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var carDetails = result.split('  '); //Splits result by , into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Selected Car: " + carDetails[1];
    document.getElementById("carID").value = carDetails[0];
    document.getElementById("carReg").value = carDetails[1] + " " + carDetails[2]; //populates fields with values at companyDetails index
    document.getElementById("currentDate").value = currentDate;
}


function submitFields()  //Submits Text fields
{
    if(document.getElementById("companyName").value != null)
    {
    document.getElementById("companyName").disabled = false;
    document.getElementById("address").disabled = false;
    document.getElementById("credit").disabled = false;
    document.getElementById("amountOwed").disabled = false;
    }
    else 
    {
        alert("Please select a company");
    }
}


function getSetTableData(x) //Takes current instance of activated function as a parameter
{
    var currentDate = new Date().toISOString().split("T")[0]; //Uses ISO 8601 standard format, splits String at T with 0 subStrings (Stack Overflow )


    var carID = document.getElementById("carTable").rows[x.rowIndex].cells[0].innerHTML;
    var carReg = document.getElementById("carTable").rows[x.rowIndex].cells[1].innerHTML;
    var costPerDay = document.getElementById("carTable").rows[x.rowIndex].cells[9].innerHTML;
    var fiveDayDiscount = document.getElementById("carTable").rows[x.rowIndex].cells[10].innerHTML;
    var tenDayDiscount = document.getElementById("carTable").rows[x.rowIndex].cells[11].innerHTML;
    document.getElementById("carID").value = carID;
    document.getElementById("carReg").value = carReg;
    document.getElementById("costPerDay").value = costPerDay;
    document.getElementById("fiveDayDiscount").value = fiveDayDiscount;
    document.getElementById("tenDayDiscount").value = tenDayDiscount;
    document.getElementById("currentDate").value = currentDate;
}

function getDate()
{
    var currentDate = new Date();
    const currentDay = currentDate.getDate();
    const currentMonth = currentDate.getMonth() + 1;
    const currentYear = currentDate.getFullYear();

    const formattedDate = currentDate.toISOString().split('T')[0];
    document.getElementById("currentDate").value = formattedDate;
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
    if(noOfDays < 0)
    {
        alert("Please Pick A valid Date");
        document.getElementById("chooseCar").disabled = true;
    }
    else
    {
        document.getElementById("chooseCar").disabled = false;
    }

    while(noOfDays > 0)
    {
        if(noOfDays >= 10)
        {
            noOfDays--;
            totalCost = (parseInt(totalCost) + parseInt(costPerDay)) - parseInt(tenDayDiscount);
        }

        if(noOfDays >= 5 && noOfDays < 10)
        {
        noOfDays--;
        totalCost = (parseInt(totalCost) + parseInt(costPerDay)) - parseInt(fiveDayDiscount);
        }
        if(noOfDays > 0 && noOfDays < 5)
        {
            noOfDays--;
            totalCost = parseInt(totalCost) + parseInt(costPerDay);
        }
    }

    document.getElementById("totalCost").value = totalCost;

    if(totalCost > creditLimit)
    {
        document.getElementById("chooseCar").disabled = true;
        alert("Insufficient Funds to Cover Rental Cost!")
    }
    else
    {
        document.getElementById("chooseCar").disabled = false;
    }


}


