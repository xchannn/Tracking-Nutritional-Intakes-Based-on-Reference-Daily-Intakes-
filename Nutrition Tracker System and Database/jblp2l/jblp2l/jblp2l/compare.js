function compare(energy, protein, vitamina, fat, carbohydrates, ascorbicacid, thiamin, riboflavin, niacin, calcium, iron, phosphorus, age, gender)
{
	if (age === "1-3")
	{
		document.getElementById("nutrition_totals").innerHTML = "For ages 1 to 3";
		if (energy > 900 && energy < 1200) 
		{
			document.getElementById("total_energy").style.color = "green";
			document.getElementById("total_energy_result").style.color = "green";
			document.getElementById("total_energy_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_energy").style.color = "red";
			document.getElementById("total_energy_result").style.color = "red";
			if (energy < 900) 
			{document.getElementById("total_energy_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_energy_result").innerHTML = "Excess";}
		}		
		
		if (protein > 20 && protein < 35) 
		{
			document.getElementById("total_protein").style.color = "green";
			document.getElementById("total_protein_result").style.color = "green";
			document.getElementById("total_protein_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_protein").style.color = "red";
			document.getElementById("total_protein_result").style.color = "red";
			if (protein < 20) 
			{document.getElementById("total_protein_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_protein_result").innerHTML = "Excess";}
		}
		
		if (vitamina > 300 && vitamina < 500) 
		{
			document.getElementById("total_vitamina").style.color = "green";
			document.getElementById("total_vitamina_result").style.color = "green";
			document.getElementById("total_vitamina_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_vitamina").style.color = "red";
			document.getElementById("total_vitamina_result").style.color = "red";
			if (vitamina < 300) 
			{document.getElementById("total_vitamina_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_vitamina_result").innerHTML = "Excess";}
		}
		
		if (ascorbicacid > 27 && ascorbicacid < 400) 
		{
			document.getElementById("total_ascorbicacid").style.color = "green";
			document.getElementById("total_ascorbicacid_result").style.color = "green";
			document.getElementById("total_ascorbicacid_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_ascorbicacid").style.color = "red";
			document.getElementById("total_ascorbicacid_result").style.color = "red";
			if (ascorbicacid < 27) 
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Excess";}
		}
		
		if (thiamin > 0.40 && thiamin < 0.60) 
		{
			document.getElementById("total_thiamin").style.color = "green";
			document.getElementById("total_thiamin_result").style.color = "green";
			document.getElementById("total_thiamin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_thiamin").style.color = "red";
			document.getElementById("total_thiamin_result").style.color = "red";
			if (thiamin < 0.40) 
			{document.getElementById("total_thiamin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_thiamin_result").innerHTML = "Excess";}
		}
		
		if (riboflavin > 0.40 && riboflavin < 0.60) 
		{
			document.getElementById("total_riboflavin").style.color = "green";
			document.getElementById("total_riboflavin_result").style.color = "green";
			document.getElementById("total_riboflavin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_riboflavin").style.color = "red";
			document.getElementById("total_riboflavin_result").style.color = "red";
			if (riboflavin < 0.40) 
			{document.getElementById("total_riboflavin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_riboflavin_result").innerHTML = "Excess";}
		}
		
		if (niacin > 5 && niacin < 8) 
		{
			document.getElementById("total_niacin").style.color = "green";
			document.getElementById("total_niacin_result").style.color = "green";
			document.getElementById("total_niacin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_niacin").style.color = "red";
			document.getElementById("total_niacin_result").style.color = "red";
			if (niacin < 5) 
			{document.getElementById("total_niacin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_niacin_result").innerHTML = "Excess";}
		}
		
		if (calcium > 400 && calcium < 700) 
		{
			document.getElementById("total_calcium").style.color = "green";
			document.getElementById("total_calcium_result").style.color = "green";
			document.getElementById("total_calcium_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_calcium").style.color = "red";
			document.getElementById("total_calcium_result").style.color = "red";
			if (calcium < 400) 
			{document.getElementById("total_calcium_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_calcium_result").innerHTML = "Excess";}
		}
		
		if (iron > 5 && iron < 13) 
		{
			document.getElementById("total_iron").style.color = "green";
			document.getElementById("total_iron_result").style.color = "green";
			document.getElementById("total_iron_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_iron").style.color = "red";
			document.getElementById("total_iron_result").style.color = "red";
			if (iron < 5) 
			{document.getElementById("total_iron_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_iron_result").innerHTML = "Excess";}
		}
		
		if (phosphorus > 300 && phosphorus < 500) 
		{
			document.getElementById("total_phosphorus").style.color = "green";
			document.getElementById("total_phosphorus_result").style.color = "green";
			document.getElementById("total_phosphorus_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_phosphorus").style.color = "red";
			document.getElementById("total_phosphorus_result").style.color = "red";
			if (phosphorus < 300) 
			{document.getElementById("total_phosphorus_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_phosphorus_result").innerHTML = "Excess";}
		}
	}
	else
	if (age === "4-6")
	{
		document.getElementById("nutrition_totals").innerHTML = "For males aged 10-12";
		if (energy > 1000 && energy < 2000) 
		{
			document.getElementById("total_energy").style.color = "green";
			document.getElementById("total_energy_result").style.color = "green";
			document.getElementById("total_energy_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_energy").style.color = "red";
			document.getElementById("total_energy_result").style.color = "red";
			if (energy < 1000) 
			{document.getElementById("total_energy_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_energy_result").innerHTML = "Excess";}
		}		
		
		if (protein > 30 && protein < 50) 
		{
			document.getElementById("total_protein").style.color = "green";
			document.getElementById("total_protein_result").style.color = "green";
			document.getElementById("total_protein_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_protein").style.color = "red";
			document.getElementById("total_protein_result").style.color = "red";
			if (protein < 40) 
			{document.getElementById("total_protein_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_protein_result").innerHTML = "Excess";}
		}
		
		if (vitamina > 300 && vitamina < 500) 
		{
			document.getElementById("total_vitamina").style.color = "green";
			document.getElementById("total_vitamina_result").style.color = "green";
			document.getElementById("total_vitamina_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_vitamina").style.color = "red";
			document.getElementById("total_vitamina_result").style.color = "red";
			if (vitamina < 300) 
			{document.getElementById("total_vitamina_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_vitamina_result").innerHTML = "Excess";}
		}
		
		if (ascorbicacid > 30 && ascorbicacid < 500) 
		{
			document.getElementById("total_ascorbicacid").style.color = "green";
			document.getElementById("total_ascorbicacid_result").style.color = "green";
			document.getElementById("total_ascorbicacid_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_ascorbicacid").style.color = "red";
			document.getElementById("total_ascorbicacid_result").style.color = "red";
			if (ascorbicacid < 20) 
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Excess";}
		}
		
		if (thiamin > 0.70 && thiamin < 1.2) 
		{
			document.getElementById("total_thiamin").style.color = "green";
			document.getElementById("total_thiamin_result").style.color = "green";
			document.getElementById("total_thiamin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_thiamin").style.color = "red";
			document.getElementById("total_thiamin_result").style.color = "red";
			if (thiamin < 0.70) 
			{document.getElementById("total_thiamin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_thiamin_result").innerHTML = "Excess";}
		}
		
		if (riboflavin > 0.8 && riboflavin < 1.60) 
		{
			document.getElementById("total_riboflavin").style.color = "green";
			document.getElementById("total_riboflavin_result").style.color = "green";
			document.getElementById("total_riboflavin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_riboflavin").style.color = "red";
			document.getElementById("total_riboflavin_result").style.color = "red";
			if (riboflavin < 0.8) 
			{document.getElementById("total_riboflavin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_riboflavin_result").innerHTML = "Excess";}
		}
		
		if (niacin > 9 && niacin < 20) 
		{
			document.getElementById("total_niacin").style.color = "green";
			document.getElementById("total_niacin_result").style.color = "green";
			document.getElementById("total_niacin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_niacin").style.color = "red";
			document.getElementById("total_niacin_result").style.color = "red";
			if (niacin < 9) 
			{document.getElementById("total_niacin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_niacin_result").innerHTML = "Excess";}
		}
		
		if (calcium > 800 && calcium < 1500) 
		{
			document.getElementById("total_calcium").style.color = "green";
			document.getElementById("total_calcium_result").style.color = "green";
			document.getElementById("total_calcium_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_calcium").style.color = "red";
			document.getElementById("total_calcium_result").style.color = "red";
			if (calcium < 800) 
			{document.getElementById("total_calcium_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_calcium_result").innerHTML = "Excess";}
		}
		
		if (iron > 8 && iron < 20) 
		{
			document.getElementById("total_iron").style.color = "green";
			document.getElementById("total_iron_result").style.color = "green";
			document.getElementById("total_iron_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_iron").style.color = "red";
			document.getElementById("total_iron_result").style.color = "red";
			if (iron < 8) 
			{document.getElementById("total_iron_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_iron_result").innerHTML = "Excess";}
		}
		
		if (phosphorus > 1000 && phosphorus < 1900) 
		{
			document.getElementById("total_phosphorus").style.color = "green";
			document.getElementById("total_phosphorus_result").style.color = "green";
			document.getElementById("total_phosphorus_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_phosphorus").style.color = "red";
			document.getElementById("total_phosphorus_result").style.color = "red";
			if (phosphorus < 1000) 
			{document.getElementById("total_phosphorus_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_phosphorus_result").innerHTML = "Excess";}
		}
	}
	else
	if ((age === "10-12") && (gender === "Male"))
	{
		document.getElementById("nutrition_totals").innerHTML = "For males aged 10-12";
		if (energy > 1800 && energy < 2500) 
		{
			document.getElementById("total_energy").style.color = "green";
			document.getElementById("total_energy_result").style.color = "green";
			document.getElementById("total_energy_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_energy").style.color = "red";
			document.getElementById("total_energy_result").style.color = "red";
			if (energy < 1800) 
			{document.getElementById("total_energy_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_energy_result").innerHTML = "Excess";}
		}		
		
		if (protein > 40 && protein < 80) 
		{
			document.getElementById("total_protein").style.color = "green";
			document.getElementById("total_protein_result").style.color = "green";
			document.getElementById("total_protein_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_protein").style.color = "red";
			document.getElementById("total_protein_result").style.color = "red";
			if (protein < 40) 
			{document.getElementById("total_protein_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_protein_result").innerHTML = "Excess";}
		}
		
		if (vitamina > 300 && vitamina < 500) 
		{
			document.getElementById("total_vitamina").style.color = "green";
			document.getElementById("total_vitamina_result").style.color = "green";
			document.getElementById("total_vitamina_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_vitamina").style.color = "red";
			document.getElementById("total_vitamina_result").style.color = "red";
			if (vitamina < 300) 
			{document.getElementById("total_vitamina_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_vitamina_result").innerHTML = "Excess";}
		}
		
		if (ascorbicacid > 30 && ascorbicacid < 500) 
		{
			document.getElementById("total_ascorbicacid").style.color = "green";
			document.getElementById("total_ascorbicacid_result").style.color = "green";
			document.getElementById("total_ascorbicacid_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_ascorbicacid").style.color = "red";
			document.getElementById("total_ascorbicacid_result").style.color = "red";
			if (ascorbicacid < 20) 
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_ascorbicacid_result").innerHTML = "Excess";}
		}
		
		if (thiamin > 0.70 && thiamin < 1.2) 
		{
			document.getElementById("total_thiamin").style.color = "green";
			document.getElementById("total_thiamin_result").style.color = "green";
			document.getElementById("total_thiamin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_thiamin").style.color = "red";
			document.getElementById("total_thiamin_result").style.color = "red";
			if (thiamin < 0.70) 
			{document.getElementById("total_thiamin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_thiamin_result").innerHTML = "Excess";}
		}
		
		if (riboflavin > 0.8 && riboflavin < 1.60) 
		{
			document.getElementById("total_riboflavin").style.color = "green";
			document.getElementById("total_riboflavin_result").style.color = "green";
			document.getElementById("total_riboflavin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_riboflavin").style.color = "red";
			document.getElementById("total_riboflavin_result").style.color = "red";
			if (riboflavin < 0.8) 
			{document.getElementById("total_riboflavin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_riboflavin_result").innerHTML = "Excess";}
		}
		
		if (niacin > 9 && niacin < 20) 
		{
			document.getElementById("total_niacin").style.color = "green";
			document.getElementById("total_niacin_result").style.color = "green";
			document.getElementById("total_niacin_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_niacin").style.color = "red";
			document.getElementById("total_niacin_result").style.color = "red";
			if (niacin < 9) 
			{document.getElementById("total_niacin_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_niacin_result").innerHTML = "Excess";}
		}
		
		if (calcium > 800 && calcium < 1500) 
		{
			document.getElementById("total_calcium").style.color = "green";
			document.getElementById("total_calcium_result").style.color = "green";
			document.getElementById("total_calcium_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_calcium").style.color = "red";
			document.getElementById("total_calcium_result").style.color = "red";
			if (calcium < 800) 
			{document.getElementById("total_calcium_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_calcium_result").innerHTML = "Excess";}
		}
		
		if (iron > 8 && iron < 20) 
		{
			document.getElementById("total_iron").style.color = "green";
			document.getElementById("total_iron_result").style.color = "green";
			document.getElementById("total_iron_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_iron").style.color = "red";
			document.getElementById("total_iron_result").style.color = "red";
			if (iron < 8) 
			{document.getElementById("total_iron_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_iron_result").innerHTML = "Excess";}
		}
		
		if (phosphorus > 1000 && phosphorus < 1900) 
		{
			document.getElementById("total_phosphorus").style.color = "green";
			document.getElementById("total_phosphorus_result").style.color = "green";
			document.getElementById("total_phosphorus_result").innerHTML = " Balanced";
		}
		else
		{
			document.getElementById("total_phosphorus").style.color = "red";
			document.getElementById("total_phosphorus_result").style.color = "red";
			if (phosphorus < 1000) 
			{document.getElementById("total_phosphorus_result").innerHTML = "Deficient";}
			else
			{document.getElementById("total_phosphorus_result").innerHTML = "Excess";}
		}
	}
	else{alert("error");}
}