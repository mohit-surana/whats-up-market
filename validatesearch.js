function validate()
{
	name=document.getElementById("name").checked;
	ID=document.getElementById("ID").checked;
	searchfor=document.getElementById("searchfor").value;
	//alert(name);
	//alert(ID);
	
	if(name==false)
	{
		if(ID==false)
		{
			alert("please choose an option");
			return false;
		}
	}
	else
	{
		if(!ID)
		{
			//alert(document.getElementById('name'));
			if(!(isNaN(searchfor)))
			{
				alert("You've chosen NAME. Please enter a name.");
				return false;
			}	
		}
		else
		{
			if(searchfor == "" || isNaN(searchfor))
			{
				alert("You've chosen employee ID. Please enter a number.");
				return false;
			}	
		}
	}
	return true;
}