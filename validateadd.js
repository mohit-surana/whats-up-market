function validate()
{
	emp_id=document.getElementById("emp_id");
	emp_name=document.getElementById("emp_name");
	salary=document.getElementById("salary");
	contact=document.getElementById("contact");
	if(emp_id.value == "")
	{
		alert("Please enter the Employee ID");
		return false;
	}
	
	else if(emp_name.value == "")
	{
		alert("Please enter the name of the employee");
		return false;
	}
	else if(salary.value == "")
	{
		alert("Please enter the salary");
		return false;
	}
	else if(contact.value == "")
	{
		alert("Please enter the contact of the Employee");
		return false;
	}	
	return true;
}