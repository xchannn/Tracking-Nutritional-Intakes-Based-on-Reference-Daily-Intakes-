<?php
session_start();
require_once "config_server.php";

$searchvalue = $_POST['searchvalue_operation'];
$sessionid = $_POST["session"];

if (empty($searchvalue)) {
	echo "";
} else {
	$sql = "SELECT * FROM nutritiontracker_foodcomposition WHERE fc_foodname LIKE '%$searchvalue%' GROUP BY fc_foodname";
	$result = $conn->query($sql);

	if (mysqli_query($conn, $sql)) {
		if ($result->num_rows > 0) {
			echo "<script src='jquery.session.js'></script>";
			echo "<script src='functions.js'></script>";

			echo "<table class='table' style='border: 1px solid white;'></br>";
			// echo "<tr>";
			// echo "<th></th>";
			// echo "<th>Search Results</th>";
			// echo "</tr>";
			while ($row = $result->fetch_assoc()) {
				echo "
					<script>
						function food_input" . $row['fc_id'] . "(select_food1, input_sessionid1) 
						{
							var e = document.getElementById('meal_type');
							var value = e.value;
							console.log(value);
							$.post('operation_input.php',
							{
								select_food: select_food1,
								input_sessionid: input_sessionid1,
								meal : value
							},
							function(data, status)
							{
								$.post('operation_read-inputs.php', {session: " . $sessionid . "}).done(function(data) 
								{
									$('#table').html(data);
								});
							});
						}</script>";
				echo "<tr style='border: 1px solid white; text-align: left;'>";
				echo "<td min-width: 5vw;'><input id='button_add" . $row['fc_id'] . "' class='button_add' type='button' value='Add' onclick='food_input" . $row['fc_id'] . "(" . $row['fc_id'] . ", " . $sessionid . ")'></td>";
				echo "<td>" . $row['fc_foodname'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	$conn->close();
}
?>
<script>
	$(".button_add").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $(".table").offset().top
		}, 100);
	});
</script>