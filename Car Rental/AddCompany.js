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


