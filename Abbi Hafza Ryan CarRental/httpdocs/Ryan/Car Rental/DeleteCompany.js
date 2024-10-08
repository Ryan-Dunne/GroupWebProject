/*  Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Javascript for Delete Company Screen
*/
function helpMenu()
{
    alert ("Ensure Company does NOT owed money\n\n Ensure Company is NOT currently Blacklisted\n\n Upon Submission, Companies are set for deletion & not permanently deleted")
}

function confirmSubmit()    //function called when form is about to be submit
{

        if(confirm("Are you sure you want to submit this form?") == false) //Asks for confirmation
        {
            return false; //User cancels submission
        }
        else //User confirms submission
        {
            submitFields(); //Enables fields so they can be sent using POST
            return true; //Submits
            
        }
   
}


function canBeDeleted() //function to check if deletion conditions are met (Blacklist Flag = N & AmountOwed = 0)
{
    $amountOwed = document.getElementById("amountOwed").value; //Conditions are checked using the values from the form
    $BLFlag = document.getElementById("blacklistFlag").value; 

    if($amountOwed == 0 && $BLFlag == "N") //If Deletion conditions are met...
    {
        if(confirm("Are you sure you want to submit this form?") == false) //Asks for confirmation
        {
            return false; //User cancels submission
        }
        else //User confirms submission
        {
            submitFields(); //Enables fields so they can be sent using POST
            return true; //Submits
            
        }   
    }

    else
    {
        alert("Ensure the company is NOT blacklisted and doesn't owe any money"); //Displays Error
        return false;
    }

}





function populate()  //Populates Text fields
{
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by double spaces into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Selected Company: " + companyDetails[1];
    document.getElementById("companyID").value = companyDetails[0];
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

function submitFields()  //Submits Text fields by ensuring they're all enabled upon form submission
{
    document.getElementById("companyID").disabled = false;
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