<?php
$islogin = false;
if (isset($_SESSION["islogin"])) {
	$islogin = $_SESSION["islogin"];
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="NutritionTrackerLogo.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="config_design.css">
	<title>Nutrition Tracker</title>
	<script src="jquery.min.js"></script>
	<script src="jquery.session.js"></script>
	<script>
		window.onload = function() {
			$("#table").load("operation_read-rdi.php");
		}
	</script>
</head>

<body>
	<div class="container-fluid">
		<div id="top" class="container-fluid">
			<div class="container-fluid" style="padding:15px;background-color: #e1f3f0; color: white; text-align: center;">
				<div class="col-12">
					<div class="container-fluid" style="text-align:center; float:left; overflow-x: hidden; background-color: #e1f3f0;">
						<div style="text-align: center;">
							<img src="assets/logoNutrientsTracker.png" style="height: 15vw;" />
						</div>
					</div>
				</div>
				<div class="container-fluid" style="display: flex; justify-content: space-between; width: 70%;">
					<a href="index.php">Tracker</a>
					<a href="rdi.php">RDI</a>
					<a href="foodlist.php">Food List</a>
					<a href="foodrecommendation.php">Meal Recommendation</a>
					<a href="help.php">Help</a>
					<?php
					if ($islogin == true) {
					?>
						<a id="logout" href="">Logout</a>
					<?php
					} else { ?>
						<a href="login.php">Login</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div id="middlegroup">
			<div id="table" style="border:1px;"></div>
		</div>
		<div id="bottom" class="container-fluid" style="text-align:center;">
		</div>
	</div>
</body>

</html>

<script>
	$(document).on('click', '#logout', function() {

		$.ajax({
			type: 'post',
			url: "ajax/ajax_function.php?logout",
			data: {},
			success: function(response) {
				window.location.href = "http://localhost/jblp2l/login.php";
			}
		});
	})
</script>