function ConfirmCheck(){	//confirmation before its saved on db
		var response;
		response = confirm("Are you sure you want to add this Car Type?");
		if (response){
			return true;
		}
		else{
			return false;
		}
	}