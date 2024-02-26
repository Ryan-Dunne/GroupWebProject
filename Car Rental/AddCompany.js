function helpMenu()
{
    alert ("Help")
}

function generateNumber()
{
    const LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; //String of Letters
    let letterLength = LETTERS.length;  //Length of String
    
    let startingLetter = LETTERS.charAt(Math.floor(Math.random() * letterLength)) //Starting letter will be randomly chosen from 0 to letterLength value
    
    let number = Math.floor((Math.random() * 10000000) + 1) //Random number generated from 1 to 1000000
    document.getElementById("id").value = startingLetter+number; //combines then to make a Company ID, sent to form on page load
}   

function resetForm()
{
    document.getElementById("company").value = null;
    document.getElementById("address").value = null;
    document.getElementById("balance").value = null;
    document.getElementById("credit").value = null;
}