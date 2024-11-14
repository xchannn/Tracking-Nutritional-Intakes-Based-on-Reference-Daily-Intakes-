function balanced(nutrient) //displays green text to inform user of balanced diet
{
	variable = nutrient;
	document.getElementById("total_" + variable).style.color = "green";
	document.getElementById("total_" + variable + "_result").style.color = "green";
	document.getElementById("total_" + variable + "_result").innerHTML = " Balanced";
}

function unbalanced(nutrient, value, lowerlimit, age, gender) //runs when imbalance is detected
{
	variable = nutrient; //variable = the imbalanced nutrient detected
	document.getElementById("total_" + variable).style.color = "red";
	document.getElementById("total_" + variable + "_result").style.color = "red";
	if (value < lowerlimit) //value is the imbalanced nutrient amount
	{
		document.getElementById("total_" + variable + "_result").innerHTML = "Deficient";
		imbalance = "deficient";
		console.log("#"+variable+"-deficient");
		$("."+variable+"-deficient").css('display','')
		$("."+variable+"-minus").html(value-lowerlimit)
		healthconditions(imbalance, variable, age, gender);
	}
	else
	{
		document.getElementById("total_" + variable + "_result").innerHTML = "Excess";
		imbalance = "excess";
		healthconditions(imbalance, variable, age, gender);
	}
}

function healthconditions(imbalance, value, age, gender)
{
	console.log(value);
	$.post("operation_read-hc.php",
	{
		nutrient: value,
		type: imbalance,
		age: age,
		gender: gender
	},
	function(data, status)
	{
		$("#healthrisks").append(data);
		console.log(data);
		var arr = $("#healthrisks tr");
		$.each(arr, function(i, item) //eliminates duplicate health risks caused by multiple deficiencies
		{
			
		});
	});
}

function recommendation1()
{
	var sick = "";
	var x = 0;
	var arr = $("#healthrisks tr");
	var y = arr.length;
	while (x < y)
	{
		var name = "#hcname" + x;
		sick = $(name).text();
		x=x+1;
	}
	$.post("operation_recommendations1.php",
	{
		nutrient: sick
	},
	function(data, status)
	{
		$("#food_recommendations").append(data);
		var arr = $("#food_recommendations tr");
		$.each(arr, function(i, item) //eliminates duplicate health risks caused by multiple deficiencies
		{
			var currIndex = $("#food_recommendations tr").eq(i);
			var matchText = currIndex.children("td").first().text();
			$(this).nextAll().each(function(i, inItem) 
			{
				if(matchText===$(this).children("td").first().text()) 
				{
					$(this).remove();
				}
			});
		});
	});
}

function compare(energy, protein, fat, carbohydrates, calcium, iron, vitamina, thiamin, riboflavin, niacin, ascorbicacid, age, gender)
{

	//contains individual nutrient ranges for each age group
	const nutrients = ["energy", "protein", "fat", "carbohydrate", "calcium", "iron", "vitamina", "thiamin", "riboflavin", "niacin", "ascorbicacid"];
	switch(age) 
	{
		case "19":
		case "20":
		case "21":
		case "22":
		case "23":
		case "24":
		case "25":
		case "26":
		case "27":
		case "28":
		case "29":
			switch(gender)
			{		
				case "Male":
					document.getElementById("nutrition_totals").innerHTML = "For males aged 19-29";
					var i = 0;
					while (i < 11) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if (energy == 2530 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 2530;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if (protein == 71) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 71;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrate":
								if ( carbohydrates == 130 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 50;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 750 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 750;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 12 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 12;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 700 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 700;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if (thiamin == 1.2) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.2;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.3 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.3;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if (niacin == 16 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 16;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 70 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 70;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				
				
				case "Female":
					document.getElementById("nutrition_totals").innerHTML = "For females aged 19-29";
					var i = 0;
					while (i < 10) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if ( energy == 1930 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 1930;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if ( protein == 62 ) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 62;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrates":
								if ( carbohydrates == 130 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 50;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 750 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 750;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 28 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 28;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 600 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 600;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if (thiamin == 1.1) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.1 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if ( niacin == 14 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 14;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 60 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 60;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				default:
					alert(gender);
			} //gender end parse
		break;
		

		case "30":
		case "31":
		case "32":
		case "33":
		case "34":
		case "35":
		case "36":
		case "37":
		case "38":
		case "39":
		case "40":
		case "41":
		case "42":
		case "43":
		case "44":
		case "45":
		case "46":
		case "47":
		case "48":
		case "49":
			switch(gender)
			{		
				case "Male":
					document.getElementById("nutrition_totals").innerHTML = "For males aged 30-49";
					var i = 0;
					while (i < 10) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if ( energy == 2430 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 2430;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if ( protein == 71 ) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 71;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrates":
								if ( carbohydrates == 130 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 50;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 750 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 750;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 12 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 12;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 700 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 700;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if (thiamin == 1.2) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.2;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.3 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.3;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if ( niacin == 16 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 16;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 70 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 70;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				
				
				case "Female":
					document.getElementById("nutrition_totals").innerHTML = "For females aged 30-49";
					var i = 0;
					while (i < 10) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if ( energy == 1830 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 1830;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if ( protein == 62 ) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 62;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrates":
								if ( carbohydrates == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 750 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 750;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 28 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 28;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 600 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 600;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if (thiamin == 1.1) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.1 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if ( niacin == 14 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 14;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 60 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 60;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				default:
					alert(gender);
			} //gender end parse
		break;
		

		case "50":
		case "51":
		case "52":
		case "53":
		case "54":
		case "55":
		case "56":
		case "57":
		case "58":
		case "59":
			switch(gender)
			{		
				case "Male":
					document.getElementById("nutrition_totals").innerHTML = "For males aged 50-59";
					var i = 0;
					while (i < 10) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if ( energy == 2420 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 2420;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if ( protein == 71 ) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 71;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrates":
								if ( carbohydrates == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 750 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 750;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 12 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 12;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 700 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 700;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if ( thiamin == 1.2 ) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.2;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.3 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.3;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if ( niacin == 16 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 16;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 70 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 70;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				
				
				case "Female":
					document.getElementById("nutrition_totals").innerHTML = "For females aged 50-64";
					var i = 0;
					while (i < 10) 
					{
						nutrient = nutrients[i];
						switch(nutrient)
						{
							case "energy":
								if ( energy == 2 ) 
								{
									balanced(nutrient);
								}
								else
								{
									value = energy;
									lowerlimit = 2;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "protein":
								if ( protein == 62 ) //*2 
								{
									balanced(nutrient);
								}
								else
								{
									value = protein;
									lowerlimit = 62;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "fat":
								if ( fat == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = fat;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "carbohydrates":
								if ( carbohydrates == 540 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = carbohydrates;
									lowerlimit = 540;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "calcium":
								if ( calcium == 800 ) //2500, 50+ yrs 2000 / 750
								{
									balanced(nutrient);
								}
								else
								{
									value = calcium;
									lowerlimit = 800;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "iron":
								if ( iron == 10 ) //<14 40, 14+ 45		 rbi 20.00
								{
									balanced(nutrient);
								}
								else
								{
									value = iron;
									lowerlimit = 10;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "vitamina":
								if ( vitamina == 600 ) //*3 
								{
									balanced(nutrient);
								}
								else
								{
									value = vitamina;
									lowerlimit = 600;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "thiamin":
								if ( thiamin == 1.1 ) //*10 //rdi1.20
								{
									balanced(nutrient);
								}
								else
								{
									value = thiamin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "riboflavin":
								if ( riboflavin == 1.1 ) //*10 rbi 1.50
								{
									balanced(nutrient);
								}
								else
								{
									value = riboflavin;
									lowerlimit = 1.1;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "niacin":
								if ( niacin == 14 ) //*10 rbi 16.00
								{
									balanced(nutrient);
								}
								else
								{
									value = niacin;
									lowerlimit = 14;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							case "ascorbicacid":
								if (ascorbicacid == 60 ) //19-70yrs 4000, 71+ and 5kids 3000
								{
									balanced(nutrient);
								}
								else
								{
									value = ascorbicacid;
									lowerlimit = 60;
									unbalanced(nutrient, value, lowerlimit, age, gender);
								}
							break;
							default:
						}
						i++;
					}
				break;
				default:
				alert(gender);
			} //gender end parse
		break;
		
	}
}