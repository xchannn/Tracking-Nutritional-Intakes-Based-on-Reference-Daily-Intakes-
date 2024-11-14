function searchbox() 
{
	searchvalue_index = $(".searchbox").val();
    
	$.post("operation_search.php",
	{
		session: sessionvariable1,
		searchvalue_operation: searchvalue_index
	},
	function(data, status)
	{
		//alert("Data: " + data + "\nStatus: " + status);
		$("#foodlist").html(data);
	});
}

function searchbox2() 
{
	searchvalue_index = $(".searchbox2").val();
    
	$.post("operation_search.php",
	{
		session: sessionvariable1,
		searchvalue_operation: searchvalue_index
	},
	function(data, status)
	{
		//alert("Data: " + data + "\nStatus: " + status);
		$("#foodlist2").html(data);
	});
}

function searchbox3() 
{
	searchvalue_index = $(".searchbox3").val();
    
	$.post("operation_search.php",
	{
		session: sessionvariable1,
		searchvalue_operation: searchvalue_index
	},
	function(data, status)
	{
		//alert("Data: " + data + "\nStatus: " + status);
		$("#foodlist3").html(data);
	});
}

function food_input(select_food, input_sessionid) 
{    
	$.post("operation_input.php",
	{
		session: sessionvariable1,
		searchvalue_operation: searchvalue_index
	},
	function(data, status)
	{
		
	});
}