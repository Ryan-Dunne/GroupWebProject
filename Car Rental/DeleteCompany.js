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
            submitFields();
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





function populate()  //Populates Text fields
{
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by , into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Selected Company: " + companyDetails[1];
    document.getElementById("companyName").value = companyDetails[1]; //populates fields with values at companyDetails index
    document.getElementById("companyAddress").value = companyDetails[2];
    document.getElementById("phone").value = companyDetails[3];
    document.getElementById("companyWeb").value = companyDetails[4];
    document.getElementById("companyEmail").value = companyDetails[5];
    document.getElementById("credit").value = companyDetails[6];
    document.getElementById("amountOwed").value = companyDetails[7];
    document.getElementById("blacklistFlag").value = companyDetails[8];
    document.getElementById("noOfBlacklists").value = companyDetails[9];
}

function submitFields()  //Submits Text fields
{

    document.getElementById("companyName").disabled = false;
    document.getElementById("companyAddress").disabled = false;
    document.getElementById("phone").disabled = false;
    document.getElementById("companyWeb").disabled = false;
    document.getElementById("companyEmail").disabled = false;
    document.getElementById("credit").disabled = false;
    document.getElementById("amountOwed").disabled = false;
    document.getElementById("blacklistFlag").disabled = false;
    document.getElementById("noOfBlacklists").disabled = false;



}