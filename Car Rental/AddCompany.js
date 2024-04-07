/*  Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Javascript functionality for Add Company Screen
*/
function helpMenu()
{
    alert ("A Company's Web Address is not required\n\n New Companies should start at 1000 credit limit\n\n Country Code for phone number is not required")
}

function confirmSubmit()    //function called when form is about to be submit
{

        if(confirm("Are you sure you want to submit this form?") == false) //If user clicks cancel...
        {
            return false; //Does not send form
        }
        else
        {
            return true;
        }
   
}


