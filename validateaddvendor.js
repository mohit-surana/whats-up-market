 function validate()
{
	vendor_id=document.getElementById("vendor_id");
	vendor_name=document.getElementById("vendor_name");
	address=document.getElementById("address");
	contact=document.getElementById("contact");
	if(vendor_id.value == "")
	{
		alert("Please enter the Vendor ID");
		return false;
	}
	
	else if(vendor_name.value == "")
	{
		alert("Please enter the name of the vendor");
		return false;
	}
	else if(address.value == "")
	{
		alert("Please enter the address");
		return false;
	}
	else if(contact.value == "")
	{
		alert("Please enter the contact of the vendor");
		return false;
	}	
	return true;
}