<?php
	session_start();
	require_once "config_server.php";
	
	$nutrient = $_POST["nutrient"];
	$amount = $_POST["amount"];
	$type = $_POST["type"];
	$age = $_POST["agerange"];
	$alternate = $_POST["alternate"];
	$name = $_POST["name"];
	$sessionid = $_POST["session"];
	
	$difference = 0;

	$sql = "SELECT * FROM nutritiontracker_rdi WHERE rdi_range = '$age'";
	$sql1 = "SELECT * FROM nutritiontracker_foodcomposition ORDER BY ABS(fc_".$nutrient." - $difference) LIMIT 1";  //combines results from to queries into one and finds closest value
	
	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
	
	if ($type = "deficient")
	{
		if ($result1->num_rows > 0)
		{
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc())
				{
					$difference = $row['rdi_'.$alternate.''] - $amount;
					echo $difference."<br>";
				}
			}
			while($row = $result->fetch_assoc())
			{
				echo "
					<script>
					function food_input".$row['fc_id']."(select_food1, input_sessionid1) 
					{
						$.post('operation_input.php',
						{
							select_food: select_food1,
							input_sessionid: input_sessionid1
						},
						function(data, status)
						{
							$.post('operation_read-inputs.php', {session: ".$sessionid."}).done(function(data) 
							{
								$('#table').html(data);
							});
						});
					}</script>";
					echo "<tr>";
					echo "<td style='border: 1px solid white; padding: 2px;'>For ". $type . " " . $name . "</td>";
					echo "<td style='text-align: center; min-width: 5vw;'><input id='button_add".$row['fc_id']."' class='button_add' type='button' value='Add' onclick='food_input".$row['fc_id']."(".$row['fc_id'].", ".$sessionid.")'></td>";
					echo "<td style='border: 1px solid white; padding: 2px;'>" . $row['fc_foodname'] . "</td>";
					echo "<td style='border: 1px solid white; padding: 2px;'>" . $row['fc_'.$nutrient.''] . "</td>";
					echo "</tr>";
			}
		}
		else
		{
			echo "Error 2";
		}
	}
	else
	{
		echo "Error 3";
	}
?>
<script>
	$(".button_add").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $(".table").offset().top
		}, 100);
	});
</script>