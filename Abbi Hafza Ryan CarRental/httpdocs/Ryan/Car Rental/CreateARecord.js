
//    Ryan Dunne
//    C00263405
//    14/02/2024



function findAge() 
{
    var today = new Date(); //Current Date
    var birthDate = new Date(document.getElementById("dob").value); //User entered Date
    var age = today.getFullYear() - birthDate.getFullYear(); //Takes current year from user year to get age
    var m = today.getMonth() - birthDate.getMonth(); //Gets a values by taking current month numeric value from users month numeric value
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) //If the m value is less than 0 or m is 0 & user date is less than current date
        {
            age--; //decrements age
        }
    if(age < 16) //if age is less than 16...
    {
        alert("You must be 16 or over to enroll");  //output error
        document.getElementById("submit").disabled = true; //Disables submit button
    }
    else //Enables submit button
    { 
        document.getElementById("submit").disabled = false; 
    }
}


function areYouSureYouWanttoEnterTheRecordYouJustTypedIntoTheForm()
{
    if (confirm("Are you sure you want to enter the record?")) //if confirm is clicked, form is submitted
    {

    }
    else
    {
            event.preventDefault() //Prevents the Submit event taking place
    }

}