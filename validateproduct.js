function validate()
{
	Item_ID=document.getElementById("Item_ID").value;
	Item_Name=document.getElementById("Item_Name").value;
	Price=document.getElementById("Price").value;
	Stock_ID=document.getElementById("Stock_ID").value;
	Quantity=document.getElementById("Quantity").value;
	Threshold=document.getElementById("Threshold").value;
	Barcode=document.getElementById("Barcode").value;
	exp_date=document.getElementById("exp_date").value;
	
	if(Item_ID == "")
	{
		alert("Please enter the Item Id.");
		return false;
	}
		
	if(Item_Name == "")
	{
		alert("Please enter the Item name");
		return false;
	}	
	if(Price == "" || isNaN(Price))
	{
		alert("Please enter the price of the product");
		return false;
	}	
	if(Stock_ID == "")
	{
		alert("Please enter the stock id.");
		return false;
	}	
	
	if(Quantity == "" || isNaN(Quantity))
	{
		alert("Please enter the quantity");
		return false;
	}	
	if(Threshold == "" || isNaN(Threshold))
	{
		alert("Please enter the Threshold");
		return false;
	}	
	
	if(Barcode == "")
	{
		alert("Please enter the Barcode");
		return false;
	}	
	if(exp_date == "")
	{
		alert("Please enter the Expiry date of the item");
		return false;
	}	
	return true;
}