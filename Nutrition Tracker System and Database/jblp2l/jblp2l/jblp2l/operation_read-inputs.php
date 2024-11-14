<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
	session_start();
    require_once "config_server.php";
    
	//$q = $_REQUEST["q"];
	if(isset($_POST['session']))
	{
		$sessionid = $_POST["session"];
		
		$sql1 = "SELECT * FROM nutritiontracker_sessions ORDER BY session_id DESC LIMIT 1";
		$sql = "SELECT * FROM nutritiontracker_inputs, nutritiontracker_foodcomposition, nutritiontracker_sessions
		WHERE 
		(
			(nutritiontracker_inputs.input_fooditem = nutritiontracker_foodcomposition.fc_id) AND
			(nutritiontracker_inputs.input_sessionid = nutritiontracker_sessions.session_id) AND
			(nutritiontracker_inputs.input_sessionid = ".$sessionid."));";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{		
			echo "<script src='jquery.session.js'></script>";
			echo "<script src='functions.js'></script>";
			echo "
				<script>
					function delete_input(formdelete_inputid1) 
					{    
						$.post('operation_delete.php',
						{
							formdelete_inputid: formdelete_inputid1,
						},
						function(data, status)
						{
							$.post('operation_read-inputs.php', {session: sessionvariable1}).done(function(data) 
							{
								$('#table').html(data);
							});
						});
					}

					function add_input(formdelete_inputid1,formdelete_inputid2,formdelete_inputid3) 
					{    
						$.post('operation_add.php',
						{
							formdelete_inputid: formdelete_inputid1,
							sessionid: formdelete_inputid2,
							meal: formdelete_inputid3
						},
						function(data, status)
						{
							$.post('operation_read-inputs.php', {session: sessionvariable1}).done(function(data) 
							{
								$('#table').html(data);
							});
						});
					}
				</script>";
			
			// output data of each row
			$total_energy = 0;
			$total_protein = 0;
			$total_vitamina = 0;
			$total_ascorbicacid = 0;
			$total_thiamin = 0;
			$total_riboflavin = 0;
			$total_niacin = 0;
			$total_calcium = 0;
			$total_iron = 0;
			$total_fat = 0;
			$total_carbohydrate = 0;
			$datas = array();

			while($row = $result->fetch_assoc())
			{
				
				$datas[] = $row;
			}

			$toCountBreakfast = [];
			$toCountLunch = [];
			$toCountDinner = [];
			$toCountSnack = [];
			foreach($datas as $data){
				if( $data['meal'] == "Breakfast" ){
					$toCountBreakfast[] = $data['input_fooditem'];
				}else if( $data['meal'] == "Lunch" ){
					$toCountLunch[] = $data['input_fooditem'];
				}else if( $data['meal'] == "Dinner" ){
					$toCountDinner[] = $data['input_fooditem'];
				}else if( $data['meal'] == "Snack" ){
					$toCountSnack[] = $data['input_fooditem'];
				}
			}
			$countBreakfast = array_count_values($toCountBreakfast);
			$countLunch = array_count_values($toCountLunch);
			$countDinner = array_count_values($toCountDinner);
			$countSnack = array_count_values($toCountSnack);

			echo "<!DOCTYPE html>";
			echo "<table style='border: 1px solid white;' class='table'>";
			echo "<tr style='border: 1px solid white;'>";
			echo "<th style='border: 1px solid white; text-align: center;'></th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Food Item</th>";
			echo "</tr>";

			if( count($countBreakfast) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>BREAKFAST</th>";
				echo "</tr>";
			}

			foreach($countBreakfast as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem'] && $row['meal'] == "Breakfast" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.",\"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "</tr>";
						break 1;
					}
				}
			}

			if( count($countLunch) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>LUNCH</th>";
				echo "</tr>";
			}

			foreach($countLunch as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Lunch" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.", \"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "</tr>";
						break 1;
					}
				}
			}

			if( count($toCountDinner) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>DINNER</th>";
				echo "</tr>";
			}
			
			foreach($countDinner as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Dinner" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.",\"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "</tr>";
						break 1;
					}
				}
			}

			if( count($toCountSnack) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>SNACK</th>";
				echo "</tr>";
			}
			
			foreach($countSnack as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Snack" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.", \"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "</tr>";
						break 1;
					}
				}
			}

			echo "</table>";
			echo "<div class='modal fade modal-xl' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
			echo "<div class='modal-dialog'>";
			echo "<div class='modal-content'>";
			echo "<div class='modal-header'>";
			echo "<h5 class='modal-title'>Nutrition Tracker</h5>";
			echo "<button type='button' class='btn-close closeModal' data-bs-dismiss='modal' aria-label='Close'></button>";
			echo "</div>";
			echo "<div class='modal-body' style='overflow-x: scroll;'>";
			echo "<table style='border: 1px solid white;' class='table'>";
			echo "<tr style='border: 1px solid white;'>";
			echo "<th style='border: 1px solid white; text-align: center;'></th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Food Item</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
			echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
			echo "</tr>";
			
			if( count($countBreakfast) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>BREAKFAST</th>";
				echo "</tr>";
			}
			foreach($countBreakfast as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem'] && $row['meal'] == "Breakfast" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.",\"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_energy'] . "</td>"; $total_energy = $total_energy + ( $dup * $row['fc_energy'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_protein'] . "</td>"; $total_protein = $total_protein + ( $dup * $row['fc_protein'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_fat'] . "</td>"; $total_fat = $total_fat + ( $dup * $row['fc_fat'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_carbohydrate'] . "</td>"; $total_carbohydrate = $total_carbohydrate + ( $dup * $row['fc_carbohydrate'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_calcium'] . "</td>"; $total_calcium = $total_calcium + ( $dup * $row['fc_calcium'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_iron'] . "</td>"; $total_iron = $total_iron + ( $dup * $row['fc_iron'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_vitamina'] . "</td>"; $total_vitamina = $total_vitamina + ( $dup * $row['fc_vitamina'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_thiamin'] . "</td>"; $total_thiamin = $total_thiamin + ( $dup * $row['fc_thiamin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_riboflavin'] . "</td>"; $total_riboflavin = $total_riboflavin + ( $dup * $row['fc_riboflavin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_niacin'] . "</td>"; $total_niacin = $total_niacin + ( $dup * $row['fc_niacin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_ascorbicacid'] . "</td>"; $total_ascorbicacid = $total_ascorbicacid + ( $dup * $row['fc_ascorbicacid'] );
						echo "</tr>";
						break 1;
					}
				}
			}

			

			if( count($countLunch) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>LUNCH</th>";
				echo "</tr>";
			}

			foreach($countLunch as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Lunch" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.", \"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_energy'] . "</td>"; $total_energy = $total_energy + ( $dup * $row['fc_energy'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_protein'] . "</td>"; $total_protein = $total_protein + ( $dup * $row['fc_protein'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_fat'] . "</td>"; $total_fat = $total_fat + ( $dup * $row['fc_fat'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_carbohydrate'] . "</td>"; $total_carbohydrate = $total_carbohydrate + ( $dup * $row['fc_carbohydrate'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_calcium'] . "</td>"; $total_calcium = $total_calcium + ( $dup * $row['fc_calcium'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_iron'] . "</td>"; $total_iron = $total_iron + ( $dup * $row['fc_iron'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_vitamina'] . "</td>"; $total_vitamina = $total_vitamina + ( $dup * $row['fc_vitamina'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_thiamin'] . "</td>"; $total_thiamin = $total_thiamin + ( $dup * $row['fc_thiamin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_riboflavin'] . "</td>"; $total_riboflavin = $total_riboflavin + ( $dup * $row['fc_riboflavin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_niacin'] . "</td>"; $total_niacin = $total_niacin + ( $dup * $row['fc_niacin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_ascorbicacid'] . "</td>"; $total_ascorbicacid = $total_ascorbicacid + ( $dup * $row['fc_ascorbicacid'] );
						echo "</tr>";
						break 1;
					}
				}
			}

			if( count($toCountDinner) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>DINNER</th>";
				echo "</tr>";
			}
			
			foreach($countDinner as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Dinner" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.",\"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_energy'] . "</td>"; $total_energy = $total_energy + ( $dup * $row['fc_energy'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_protein'] . "</td>"; $total_protein = $total_protein + ( $dup * $row['fc_protein'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_fat'] . "</td>"; $total_fat = $total_fat + ( $dup * $row['fc_fat'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_carbohydrate'] . "</td>"; $total_carbohydrate = $total_carbohydrate + ( $dup * $row['fc_carbohydrate'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_calcium'] . "</td>"; $total_calcium = $total_calcium + ( $dup * $row['fc_calcium'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_iron'] . "</td>"; $total_iron = $total_iron + ( $dup * $row['fc_iron'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_vitamina'] . "</td>"; $total_vitamina = $total_vitamina + ( $dup * $row['fc_vitamina'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_thiamin'] . "</td>"; $total_thiamin = $total_thiamin + ( $dup * $row['fc_thiamin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_riboflavin'] . "</td>"; $total_riboflavin = $total_riboflavin + ( $dup * $row['fc_riboflavin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_niacin'] . "</td>"; $total_niacin = $total_niacin + ( $dup * $row['fc_niacin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_ascorbicacid'] . "</td>"; $total_ascorbicacid = $total_ascorbicacid + ( $dup * $row['fc_ascorbicacid'] );
						echo "</tr>";
						break 1;
					}
				}
			}

			if( count($toCountSnack) >= 1 ){
				echo "<tr style='border: 1px solid white;'>";
				echo "<th style='border: 1px solid white; text-align: center;'>SNACK</th>";
				echo "</tr>";
			}
			
			foreach($countSnack as $key => $dup){

				foreach($datas as $row)
				{
					if( $key == $row['input_fooditem']  && $row['meal'] == "Snack" ){
						echo "<tr style='border: 1px dotted green;'>";
						echo "<th style='border: 1px dotted green; text-align: center;'><i class='fa-solid fa-minus' onclick='delete_input(".$row['input_id'].")'></i>&nbsp;&nbsp;<input type='text' value='".$dup."' style='border:none; text-align:center; width:50%;'>&nbsp;&nbsp;<i class='fa-solid fa-plus' onclick='add_input(".$row['input_fooditem'].", ".$sessionid.", \"".$row['meal']."\")'></i></th>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $row['fc_foodname'] . "</td>";
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_energy'] . "</td>"; $total_energy = $total_energy + ( $dup * $row['fc_energy'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_protein'] . "</td>"; $total_protein = $total_protein + ( $dup * $row['fc_protein'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_fat'] . "</td>"; $total_fat = $total_fat + ( $dup * $row['fc_fat'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_carbohydrate'] . "</td>"; $total_carbohydrate = $total_carbohydrate + ( $dup * $row['fc_carbohydrate'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_calcium'] . "</td>"; $total_calcium = $total_calcium + ( $dup * $row['fc_calcium'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_iron'] . "</td>"; $total_iron = $total_iron + ( $dup * $row['fc_iron'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_vitamina'] . "</td>"; $total_vitamina = $total_vitamina + ( $dup * $row['fc_vitamina'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_thiamin'] . "</td>"; $total_thiamin = $total_thiamin + ( $dup * $row['fc_thiamin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_riboflavin'] . "</td>"; $total_riboflavin = $total_riboflavin + ( $dup * $row['fc_riboflavin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_niacin'] . "</td>"; $total_niacin = $total_niacin + ( $dup * $row['fc_niacin'] );
						echo "<td id='td_foodname" . $row['fc_id'] . "' style='border: 1px dotted green; text-align: center;'>" . $dup * $row['fc_ascorbicacid'] . "</td>"; $total_ascorbicacid = $total_ascorbicacid + ( $dup * $row['fc_ascorbicacid'] );
						echo "</tr>";
						break 1;
					}
				}
			}
			
			
			echo "<tr style='border: 1px dotted green;'>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='nutrition_totals'></td>";
			echo "<td style='border: 1px dotted green; text-align: center;'>Totals</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_energy'>" . $total_energy . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_protein'>" . $total_protein . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_fat'>" . $total_fat . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_carbohydrate'>" . $total_carbohydrate . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_calcium'>" . $total_calcium . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_iron'>" . $total_iron . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_vitamina'>" . $total_vitamina . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_thiamin'>" . $total_thiamin . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_riboflavin'>" . $total_riboflavin . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_niacin'>" . $total_niacin . "</td>";
			echo "<td style='border: 1px dotted green; text-align: center;' id='total_ascorbicacid'>" . $total_ascorbicacid . "</td>";
			echo "</tr>";
			
			echo "<tr style='border: 1px dotted green;'>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td id='total_energy_result'></td>";
			echo "<td id='total_protein_result'></td>";
			echo "<td id='total_fat_result'></td>";
			echo "<td id='total_carbohydrate_result'></td>";
			echo "<td id='total_calcium_result'></td>";
			echo "<td id='total_iron_result'></td>";
			echo "<td id='total_vitamina_result'></td>";
			echo "<td id='total_thiamin_result'></td>";
			echo "<td id='total_riboflavin_result'></td>";
			echo "<td id='total_niacin_result'></td>";
			echo "<td id='total_ascorbicacid_result'></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
			echo "<div class='modal-footer'>";
			echo "<input class='form-control' id='comparison_update' type='button' style='width: 20%;float:right;' value='Compare' onclick='newevent1()'>";
			echo "<button type='button' class='btn btn-secondary closeModal' data-bs-dismiss='modal'>Close</button>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		
		else 
		{
			echo "No entries.";
		}
			
		$conn->close();
	}
	else
	{
		echo "Please read the <span style='color: red'>notice</span> and refresh the page.";
	}
?>