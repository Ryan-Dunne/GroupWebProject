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


function canBeDeleted()
{
    $amountOwed = document.getElementById("amountOwed").value;
    $BLFlag = document.getElementById("blacklistFlag").value;

    if($amountOwed == 0 && $BLFlag == "N")
    {
        confirmSubmit();
    }

    else
    {
        alert("Ensure the company is NOT blacklisted and doesn't owe any money");
        return false;
    }

}

function checkAmountOwed()
{
    $amountOwed = document.getElementById("amountOwed").value;
    if($amountOwed > 0)
    {
        alert("amount error");
    }
}




function populate()  //Populates Text fields
{
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by , into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Selected Company: " + companyDetails[1];
    document.getElementById("companyID").value = companyDetails[0];
    document.getElementById("companyName").value = companyDetails[1]; //populates fields with values at companyDetails index
    document.getElementById("address").value = companyDetails[2];
    document.getElementById("credit").value = companyDetails[3];
    document.getElementById("amountOwed").value = companyDetails[4];

}

function populateCarlistbox()  //Populates Text fields
{
    var sel = document.getElementById("carlistbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var carDetails = result.split('  '); //Splits result by , into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Selected Company: " + carDetails[1];
    document.getElementById("carID").value = carDetails[0];
    document.getElementById("carReg").value = carDetails[1]; //populates fields with values at companyDetails index

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



