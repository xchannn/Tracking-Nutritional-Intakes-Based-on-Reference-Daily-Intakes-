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
			sessionvariable = sessionStorage.getItem('id');
			sessionvariable1 = $.session.get('id');
			if (sessionvariable = "false" && sessionvariable == null) {
				$("#sessionid").load("operation_new-session.php");
				$("#warning").show();
			} else {
				//$("#sessionid").load("operation_new-session.php");
				$("#sessionid").html("Your session ID is " + sessionvariable1 + ".");
				//alert(sessionvariable1);
				$("#warning").hide();
			}
			$("#list").load("operation_list-ages.php");
			$("#food").load("operation_list-food.php");
			$('#input_sessionid').attr('value', sessionvariable1)
			$.post("operation_read-inputs.php", {
				session: sessionvariable1,
			}).done(function(data) {
				$("#table").html(data);
			});

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
			<div id="notice" style="text-align:center">
				<h1>Notice</h1>
				<div id="top" style="text-align:left">
					<h4>1) The data from this system is intended for people with normal/healthy BMI</h3>
						<p>BMI also affects dietary requirements. However, this system lacks the data necessary to allow it to take BMI into account during calculations.
							The data needed by the system is regulated by the FDA, and the researchers do not have access to them. Please note that the dietary requirement
							provided by this system is for Filipinos with healthy body mass indexes.</p>
						<h4>2) This system should not be used for people with health conditions, unhealthy weight, or pregnancies.</h3>
							<p>People with health conditions such as diabetes, osteoporosis, and urinary tract infection may require a specialized diet. As such, their dietary
								requirements may differ from the ones provided by this system. Similarly, pregnant women also have a separate dietary requirement to ensure the health
								of their carried child.</p>
							<h4>3) Health Risk Disclaimer:</h3>
								<p>This system offers dietary suggestions, it cannot predict individual health consequences. Any potential health risks arising from adhering to these suggestions do not fall under the responsibility of the system or its developers. Users are advised to consult with healthcare professionals before making significant dietary changes, especially if they have pre-existing health conditions or concerns.</p>
				</div>
			</div>
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
				window.location.href = "login.php";
			}
		});
	})
</script>