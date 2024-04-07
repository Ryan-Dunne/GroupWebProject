/*  Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Javascript functionality for Amend/View Screen
*/

function populate()  /*Populates Text fields*/
{
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var companyDetails = result.split('  '); //Splits result by double spaces into different indexes in companyDetails
    document.getElementById("display").innerHTML = "Company selected: " + companyDetails[1];
    document.getElementById("companyID").value = companyDetails[0];
    document.getElementById("companyName").value = companyDetails[1]; //populates fields with values at companyDetails index
    document.getElementById("address").value = companyDetails[2];
    document.getElementById("phone").value = companyDetails[3];
    document.getElementById("webAddress").value = companyDetails[4];
    document.getElementById("email").value = companyDetails[5];
    document.getElementById("creditLimit").value = companyDetails[6];
    document.getElementById("amountOwed").value = companyDetails[7];
    document.getElementById("blacklistFlag").value = companyDetails[8];
    document.getElementById("previousBlacklists").value = companyDetails[9];

}

function toggleLock()   //Toggles Whether input fields are enabled or disabled
{
    if (document.getElementById("amendviewbutton").value == "Amend Details") //If button says "Amend Details"...
    {
        document.getElementById("companyName").disabled = false;
        document.getElementById("address").disabled = false;  //Enable all input fields
        document.getElementById("phone").disabled = false;
        document.getElementById("webAddress").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("creditLimit").disabled = false;
        document.getElementById("amendviewbutton").value = "View Details";  //Changes button value
        document.getElementById("submit").disabled = false;
    }
    else
    {
        document.getElementById("companyName").disabled = true;
        document.getElementById("address").disabled = true;  //Disable all input fields
        document.getElementById("phone").disabled = true;
        document.getElementById("webAddress").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("creditLimit").disabled = true;
        document.getElementById("amendviewbutton").value = "Amend Details"; //Changes button value
        document.getElementById("submit").disabled = true //Does not allow User to submit while fields are disabled (Bypasses Required Pattern Checks)
    } 
}

function confirmCheck() //Ask User to confirm their changes
{
    var response;
    response = confirm('Are you sure you want to save these changes?'); //Asks to confirm
    if(response) //if true
    {
        document.getElementById("companyName").disabled = false; //Enables fields so the values can be sent
        document.getElementById("address").disabled = false;
        document.getElementById("phone").disabled = false;
        document.getElementById("webAddress").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("creditLimit").disabled = false;
        document.getElementById("amountOwed").disabled = false;
        document.getElementById("blacklistFlag").disabled = false;
        document.getElementById("previousBlacklists").disabled = false;
    }
    else
    {
        populate();
        toggleLock();   //Does not send
        return false;
    }
}

function helpMenu() //User Help
{
    alert ("A Company's Web Address is not required\n\nCountry Code for phone number is not required\n\n ")
}
